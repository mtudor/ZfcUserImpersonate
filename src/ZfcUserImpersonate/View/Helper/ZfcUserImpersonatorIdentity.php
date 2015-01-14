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

use Zend\View\Helper\AbstractHelper;
use ZfcUser\Service\User as ZfcUserUserService;

class ZfcUserImpersonatorIdentity extends AbstractHelper
{
    /**
     * The user service.
     *
     * @var \ZfcUser\Service\User
     */
    protected $userService;

    /**
     * __invoke returns the identity of the 'real user' if impersonation is currently in progress, otherwise returning
     * false.
     *
     * @return ZfcUser\Model\UserInterface|boolean
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
    public function setUserService(ZfcUserUserService $userService)
    {
        $this->userService = $userService;

        // Fluent interface.
        return $this;
    }
}
