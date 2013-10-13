<?php

namespace ZfcUserImpersonate\Module;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

abstract class AbstractModule implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface,
    ViewHelperProviderInterface
{
    use \ZfcUserImpersonate\ModuleManager\Feature\ClassDirTrait;
    use \ZfcUserImpersonate\ModuleManager\Feature\ClassNamespaceTrait;
    use \ZfcUserImpersonate\ModuleManager\Feature\AutoloaderProviderDefaultTrait;
    use \ZfcUserImpersonate\ModuleManager\Feature\ConfigProviderTrait;
    use \ZfcUserImpersonate\ModuleManager\Feature\ControllerConfigProviderTrait;
    use \ZfcUserImpersonate\ModuleManager\Feature\ServiceConfigProviderTrait;
    use \ZfcUserImpersonate\ModuleManager\Feature\ViewHelperConfigProviderTrait;
}
