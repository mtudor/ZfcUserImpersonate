<?php

namespace ZfcUserImpersonate\ModuleManager\Feature;

use Laminas\Stdlib\ArrayUtils;

trait ViewHelperConfigProviderTrait
{
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return and merge viewhelper configuration for this module from the default location of
     * ./config/service/viewhelper.config{,.*}php.
     *
     * @return array|\Traversable
     */
    public function getViewHelperConfig()
    {
        $config = array();
        foreach (glob($this->getDir() . '/config/service/viewhelper.config{,.*}.php', GLOB_BRACE) as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
