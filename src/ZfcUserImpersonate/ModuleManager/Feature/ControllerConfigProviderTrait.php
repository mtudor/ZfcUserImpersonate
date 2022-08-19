<?php

namespace ZfcUserImpersonate\ModuleManager\Feature;

use Laminas\Stdlib\ArrayUtils;

trait ControllerConfigProviderTrait
{
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return and merge controller configuration for this module from the default location of
     * ./config/service/controller.config{,.*}php.
     *
     * @return array|\Traversable
     */
    public function getControllerConfig()
    {
        $config = array();
        foreach (glob($this->getDir() . '/config/service/controller.config{,.*}.php', GLOB_BRACE) as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
