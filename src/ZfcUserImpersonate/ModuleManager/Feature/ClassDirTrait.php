<?php

namespace ZfcUserImpersonate\ModuleManager\Feature;

trait ClassDirTrait
{
    /**
     * Because __DIR__ in a trait returns the directory for the trait, this workaround is required to get the directory
     * of the class which uses the trait.
     *
     * @returns string
     */
    protected function getDir()
    {
        return dirname((new \ReflectionClass(get_class($this)))->getFileName());
    }
}
