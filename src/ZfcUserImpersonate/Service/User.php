<?php
/**
 * User Service
 *
 * Extends ZfcUser's User Service, adding functions related to the impersonation of users.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Service;

use Zend\Authentication\Storage\StorageInterface;
use ZfcUser\Entity\UserInterface;
use ZfcUser\Service\User as ZfcUserUserService;
use ZfcUserImpersonate\Exception\Domain as DomainException;
use ZfcUserImpersonate\Exception\NotImpersonating as NotImpersonatingException;
use ZfcUserImpersonate\Exception\UserNotFound as UserNotFoundException;
use ZfcUserImpersonate\Exception\UserNotLoggedIn as UserNotLoggedInException;

class User extends ZfcUserUserService
{
    /**
     * The storage container in which the 'impersonator' (real user) is stored whilst they are impersonating another
     * user.
     *
     * @var \Zend\Authentication\Storage\StorageInterface
     */
    protected $storageForImpersonator;

    /**
     * Begin impersonation of the user identified by the supplied user id.
     *
     * The specified user becomes the current user, such that for all intents and purposes they are now the logged-in
     * user. The 'impersonator' (real user) can be restored, and impersonation ended, by calling unimpersonate().
     *
     * @param string $userId
     */
    public function impersonate($userId)
    {
        // Ensure that there is a current user (i.e. the user is logged in).
        if (!($this->getAuthService()->getIdentity() instanceof UserInterface)) {
            throw new UserNotLoggedInException();
        }

        // Retrieve the user to impersonate.
        $userToImpersonate = $this->getUserMapper()->findById($userId);

        // Assert that the user to impersonate is valid.
        if (!$userToImpersonate instanceof UserInterface) {
            // User not found.
            throw new UserNotFoundException();
        }

        // Store the 'impersonator' (real user) in storage to allow later unimpersonation.
        $this->getStorageForImpersonator()->write($this->getAuthService()->getIdentity());

        // Start impersonation by overwriting the identity stored in auth storage. Essentially, this sets the user to
        // impersonate as the logged-in user.
        $this->getAuthService()->getStorage()->write($userToImpersonate->getId());
    }

    /**
     * End impersonation.
     *
     * The 'impersonator' (real user) becomes the current user once more, such that they are now the logged-in user.
     * The identity of the user that was impersonated is cleared, leaving them logged-out.
     */
    public function unimpersonate()
    {
        // Assert that impersonation is in progress (i.e. the current user is being impersonated).
        if (!$this->isImpersonated()) {
            throw new NotImpersonatingException();
        }

        // Retrieve the 'impersonator' (real user) from storage.
        $impersonatorUser = $this->getStorageForImpersonator()->read();

        // Assert that the 'impersonator' (real user) is valid.
        if (!$impersonatorUser instanceof UserInterface) {
            // The 'impersonator' (real user) is not the correct type.
            throw new DomainException(
                '$$impersonatorUser is not an instance of UserInterface',
                500
            );
        }

        // End impersonation by restoring the original identity - the 'impersonator' (real user) - to auth storage.
        $this->getAuthService()->getStorage()->write($impersonatorUser);

        // Clear the 'impersonator' (real user) from storage.
        $this->getStorageForImpersonator()->clear();
    }

    /**
     * Return true if impersonation is in progress (i.e. the current user is being impersonated).
     *
     * @return boolean
     */
    public function isImpersonated()
    {
        // If the 'impersonator' (real user) storage is empty, the current user is not being impersonated.
        return !$this->getStorageForImpersonator()->isEmpty();
    }

    /**
     * Get the storage container for the 'impersonator' (real user).
     *
     * Session storage is used by default unless a different storage adapter has been set.
     *
     * @return \Zend\Authentication\Storage\StorageInterface
     */
    public function getStorageForImpersonator()
    {
        return $this->storageForImpersonator;
    }

    /**
     * Set the storage container for the 'impersonator' (real user).
     *
     * Session storage is used by default unless a different storage adapter has been set.
     *
     * @param  \Zend\Authentication\Storage\StorageInterface $storageForImpersonator
     * @return \ZfcUser\Service\User
     */
    public function setStorageForImpersonator(StorageInterface $storageForImpersonator)
    {
        // Set the storage container.
        $this->storageForImpersonator = $storageForImpersonator;

        // Fluent interface.
        return $this;
    }
}
