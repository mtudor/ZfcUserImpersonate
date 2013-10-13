<?php

namespace ZfcUserImpersonate\ModuleManager\Feature;

trait ClassNamespaceTrait
{
    /**
     * Because __NAMESPACE__ in a trait returns the namespace for the trait, this workaround is required to get the
     * namespace of the class which uses the trait.
     *
     * @returns string
     */
    protected function getNamespace()
    {
        return (new \ReflectionClass(get_class($this)))->getNamespaceName();
    }
}
