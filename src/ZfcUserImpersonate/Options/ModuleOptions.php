<?php

namespace ZfcUserImpersonate\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * The name of the route parameter which will contain the user id of the user to be impersonate.
     *
     * @var string
     */
    protected $userIdRouteParameter = 'userId';

    /**
     * The name of the route to which the user is redirected after starting an impersonation.
     *
     * @var string
     */
    protected $impersonateRedirectRoute = 'zfcuser';

    /**
     * The name of the route to which the user is redirected after ending an impersonation.
     *
     * @var string
     */
    protected $unimpersonateRedirectRoute = 'zfcuser';

    /**
     * Get the route parameter name which will contain the user id of the user to be impersonated.
     *
     * @return string
     */
    public function getUserIdRouteParameter()
    {
        return $this->userIdRouteParameter;
    }

    /**
     * Set the route parameter name which will contain the user id of the user to be impersonated.
     *
     * @param string $userIdRouteParameter
     * @return \ZfcUser\Options\ModuleOptions
     */
    public function setUserIdRouteParameter($userIdRouteParameter)
    {
        $this->userIdRouteParameter = $userIdRouteParameter;

        // Fluent interface.
        return $this;
    }

    /**
     * Get the name of the route to which the user is redirected after starting an impersonation.
     *
     * @return string
     */
    public function getImpersonateRedirectRoute()
    {
        return $this->impersonateRedirectRoute;
    }

    /**
     * Set the name of the route to which the user is redirected after starting an impersonation.
     *
     * @param string $impersonateRedirectRoute
     * @return \ZfcUser\Options\ModuleOptions
     */
    public function setImpersonateRedirectRoute($impersonateRedirectRoute)
    {
        $this->impersonateRedirectRoute = $impersonateRedirectRoute;

        // Fluent interface.
        return $this;
    }

    /**
     * Get the name of the route to which the user is redirected after ending an impersonation.
     *
     * @return string
     */
    public function getUnimpersonateRedirectRoute()
    {
        return $this->unimpersonateRedirectRoute;
    }

    /**
     * Set the name of the route to which the user is redirected after ending an impersonation.
     *
     * @param string $unimpersonateRedirectRoute
     * @return \ZfcUser\Options\ModuleOptions
     */
    public function setUnimpersonateRedirectRoute($unimpersonateRedirectRoute)
    {
        $this->unimpersonateRedirectRoute = $unimpersonateRedirectRoute;

        // Fluent interface.
        return $this;
    }
}
