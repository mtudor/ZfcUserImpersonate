<?php
/**
 * ZfcUserImpersonatorIdentity View Helper
 *
 * Returns the identity of the 'real user' if impersonation is currently in progress, otherwise returns false.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LmcUser\Entity\UserInterface;
use LmcUser\Service\User as ZfcUserUserService;

class ZfcUserImpersonatorIdentity extends AbstractHelper
{
    /**
     * The user service.
     *
     * @var ZfcUserUserService
     */
    protected $userService;

    /**
     * __invoke returns the identity of the 'real user' if impersonation is currently in progress, otherwise returning
     * false.
     *
     * @return UserInterface|boolean
     */
    public function __invoke()
    {
        if ($this->getUserService()->isImpersonated()) {
            return $this->getUserService()->getStorageForImpersonator()->read();
        } else {
            return false;
        }
    }

    /**
     * Get the user service.
     *
     * @return ZfcUserUserService
     */
    public function getUserService()
    {
        return $this->userService;
    }

    /**
     * Set the user service.
     *
     * @param ZfcUserUserService $userService
     */
    public function setUserService(ZfcUserUserService $userService)
    {
        $this->userService = $userService;

        // Fluent interface.
        return $this;
    }
}
