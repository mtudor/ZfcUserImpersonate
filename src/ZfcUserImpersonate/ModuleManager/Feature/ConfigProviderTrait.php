<?php

namespace ZfcUserImpersonate\ModuleManager\Feature;

use Laminas\Stdlib\ArrayUtils;

trait ConfigProviderTrait
{
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return and merge configuration for this module from the default location of ./config/module.config{,.*}php.
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        $config = array();
        foreach (glob($this->getDir() . '/config/module.config{,.*}.php', GLOB_BRACE) as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
