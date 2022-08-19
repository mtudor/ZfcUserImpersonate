<?php

namespace ZfcUserImpersonate\Module;

use Laminas\ModuleManager\Feature\AutoloaderProviderInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ModuleManager\Feature\ControllerProviderInterface;
use Laminas\ModuleManager\Feature\ServiceProviderInterface;
use Laminas\ModuleManager\Feature\ViewHelperProviderInterface;

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
