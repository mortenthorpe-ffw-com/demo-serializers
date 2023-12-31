<?php

namespace ContainerQ1bJ2kF;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_WmMEGIUService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.WmMEGIU' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.WmMEGIU'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'serializer' => ['privates', 'debug.serializer', 'getDebug_SerializerService', false],
            'testObjFactory' => ['privates', 'App\\Factory\\SerializeTestObjFactory', 'getSerializeTestObjFactoryService', true],
        ], [
            'serializer' => '?',
            'testObjFactory' => 'App\\Factory\\SerializeTestObjFactory',
        ]);
    }
}
