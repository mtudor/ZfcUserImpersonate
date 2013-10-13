<?php

namespace ZfcUserImpersonate\ModuleManager\Feature;

trait AutoloaderProviderDefaultTrait {
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return an array to configure a default autoloader instance.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                $this->getDir() . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    $this->getNamespace() => $this->getDir() . '/src/' . $this->getNamespace(),
                ),
            ),
        );
    }
}
