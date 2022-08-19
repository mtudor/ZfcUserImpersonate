<?php

namespace ZfcUserImpersonate\Options;

use Laminas\Stdlib\AbstractOptions;

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
     * Store user to session as object (true) or id (false). Set to false if you want
     * to have the user object rebuilt from the database for each request.
     *
     * @var bool
     */
    protected $storeUserAsObject = true;

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
     * @return ModuleOptions
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
     * @return ModuleOptions
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
     * @return ModuleOptions
     */
    public function setUnimpersonateRedirectRoute($unimpersonateRedirectRoute)
    {
        $this->unimpersonateRedirectRoute = $unimpersonateRedirectRoute;

        // Fluent interface.
        return $this;
    }

    /**
     * Get the setting for storing user to the session as object (rather than ID)
     *
     * @return bool
     */
    public function getStoreUserAsObject()
    {
        return $this->storeUserAsObject;
    }

    /**
     * Set the setting for storing user to the session as object (rather than ID)
     *
     * @param bool $storeAsObject
     * @return ModuleOptions
     */
    public function setStoreUserAsObject($storeAsObject)
    {
        $this->storeUserAsObject = $storeAsObject;

        // Fluent interface.
        return $this;
    }
}
