<?php
/**
 * ZfcUserImpersonate Module Class
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate;

use Zend\Authentication\Storage\Session;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use ZfcUserImpersonate\Service\User as UserService;
use ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorDisplayName;
use ZfcUserImpersonate\View\Helper\ZfcUserImpersonatorIdentity;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ServiceProviderInterface
{
    /**
     * Autoloader configuration.
     *
     * @see \Zend\ModuleManager\Feature\AutoloaderProviderInterface::getAutoloaderConfig()
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }

    /**
     * Module configuration files.
     *
     * @see \Zend\ModuleManager\Feature\ConfigProviderInterface::getConfig()
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * View helper configuration.
     *
     * @return array
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'zfcUserImpersonatorDisplayName' => function ($hm) {
                    $viewHelper = new ZfcUserImpersonatorDisplayName();
                    $viewHelper->setUserService($hm->getServiceLocator()->get('zfcuserimpersonate_user_service'));
                    return $viewHelper;
                },
                'zfcUserImpersonatorIdentity' => function ($hm) {
                    $viewHelper = new ZfcUserImpersonatorIdentity();
                    $viewHelper->setUserService($hm->getServiceLocator()->get('zfcuserimpersonate_user_service'));
                    return $viewHelper;
                },
            ),
        );
    }

    /**
     * Service configuration.
     *
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'zfcuserimpersonate_user_service' => function ($sm) {
                    $userService = new UserService();
                    $userService->setStorageForImpersonator(new Session(get_class($userService), 'impersonator'));
                    return $userService;
                }
            ),
        );
    }
}
