<?php
/**
 * ZfcUserImpersonatorDisplayName View Helper
 *
 * Returns a string containing the display name of the 'real user' if impersonation is currently in progress, otherwise
 * returns false.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ZfcUser\Entity\UserInterface;
use ZfcUser\Service\User as UserService;
use ZfcUser\View\Helper\ZfcUserDisplayName;
use ZfcUserImpersonate\Exception\Domain as DomainException;

class ZfcUserImpersonatorDisplayName extends ZfcUserDisplayName
{
    /**
     * The user service.
     *
     * @var \ZfcUser\Service\User
     */
    protected $userService;

    /**
     * __invoke returns a string containing the display name of the 'real user' if impersonation is currently in
     * progress, otherwise returns false.
     *
     * The bulk of the work is delegated to the ZfcUserDisplayName view helper.
     *
     * @return String
     */
    public function __invoke(UserInterface $user = null)
    {
        // Only continue if impersonation is currently in progress, otherwise return false.
        if ($this->getUserService()->isImpersonated()) {
            // Get the 'real user' from the storage container.
            $realUser = $this->getUserService()->getStorageForImpersonator()->read();

            // If the stored 'real user' is not of the correct type, throw an exception.
            if (!$realUser instanceof UserInterface) {
                throw new DomainException(
                    '$realUser is not an instance of UserInterface',
                    500
                );
            }
        } else {
            // No impersonation is currently in progress.
            return false;
        }

        // The bulk of the work is delegated to the ZfcUserDisplayName view helper.
        return parent::__invoke($realUser);
    }

    /**
     * Get the user service.
     *
     * @return ZfcUser\Service\User
     */
    public function getUserService()
    {
        return $this->userService;
    }

    /**
     * Set the user service.
     *
     * @param \ZfcUser\Service\User $userService
     */
    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;

        // Fluent interface.
        return $this;
    }
}
