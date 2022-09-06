<?php
/**
 * Admin Controller
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use ZfcUserImpersonate\Options\ModuleOptions;

class Admin extends AbstractActionController
{
    /**
     * The options for this module.
     *
     * @var ModuleOptions
     */
    protected $config;

    /**
     * The user service which provides the impersonation functions.
     *
     * @var \LmcUser\Service\User
     */
    protected $userService;

    /**
     * Begin impersonation of the user specified by the route parameter configured in the module configuration and
     * then redirect to the route specified in the module configuration.
     */
    public function impersonateUserAction()
    {
        // Retrieve config used for customisation of this action.
        $config = $this->getConfig();

        // Start impersonating the user specified by the user id route parameter specified in config.
        $this->getUserService()->impersonate($this->params()->fromRoute($config->getUserIdRouteParameter()));

        // Redirect to the post impersonation redirect route, if specified in config.
        $impersonateRedirectRoute = $config->getImpersonateRedirectRoute();
        if (!empty($impersonateRedirectRoute)) {
            return $this->redirect()->toRoute($impersonateRedirectRoute);
        }
    }

    /**
     * End impersonation of the currently impersonated user and then redirect to the route specified in the module
     * configuration.
     */
    public function unimpersonateUserAction()
    {
        // Retrieve config used for customisation of this action.
        $config = $this->getConfig();

        // Stop impersonating the currently impersonated user.
        $this->getUserService()->unimpersonate();

        // Redirect to the post impersonation redirect route, if specified in config.
        $unimpersonateRedirectRoute = $config->getUnimpersonateRedirectRoute();
        if (!empty($unimpersonateRedirectRoute)) {
            return $this->redirect()->toRoute($unimpersonateRedirectRoute);
        }
    }

    /**
     * Get the current module configuration.
     *
     * @return ModuleOptions
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set the module configuration.
     *
     * @param ModuleOptions $config
     * @return Admin
     */
    public function setConfig($config)
    {
        $this->config = $config;

        // Fluent interface.
        return $this;
    }

    /**
     * Get the user service.
     */
    public function getUserService()
    {
        return $this->userService;
    }

    /**
     * Set the user service.
     *
     * @param \LmcUser\Service\User $userService
     * @return Admin
     */
    public function setUserService($userService)
    {
        $this->userService = $userService;

        // Fluent interface.
        return $this;
    }
}
