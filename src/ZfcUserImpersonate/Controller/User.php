<?php
/**
 * User Controller
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Controller;

use LmcUser\Controller\UserController as ZfcUserUserController;

class User extends ZfcUserUserController
{
    /**
     * Logout and clear the identity of the current user, including identities associated with impersonating another
     * user.
     *
     * @see \LmcUser\Controller\UserController::logoutAction()
     */
    public function logoutAction()
    {
        // If the current user is being impersonated, the logout action must also end impersonation by clearing the
        // 'real user' identity.
        $this->getUserService()->getStorageForImpersonator()->clear();

        // Perform the rest of the logout action using ZfcUser functionality.
        return parent::logoutAction();
    }
}
