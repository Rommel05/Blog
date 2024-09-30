<?php

namespace Container2uyanix;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Krfdc4ZService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.krfdc4Z' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.krfdc4Z'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\PageController::AllPosts' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController::FindPostId' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController::FindUserId' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController::allusers' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController::newPost' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController::newUser' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'App\\Controller\\PageController:AllPosts' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController:FindPostId' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController:FindUserId' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController:allusers' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController:newPost' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'App\\Controller\\PageController:newUser' => ['privates', '.service_locator.GQZbvNR', 'get_ServiceLocator_GQZbvNRService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.xUrKPVU', 'get_ServiceLocator_XUrKPVUService', true],
        ], [
            'App\\Controller\\PageController::AllPosts' => '?',
            'App\\Controller\\PageController::FindPostId' => '?',
            'App\\Controller\\PageController::FindUserId' => '?',
            'App\\Controller\\PageController::allusers' => '?',
            'App\\Controller\\PageController::newPost' => '?',
            'App\\Controller\\PageController::newUser' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\PageController:AllPosts' => '?',
            'App\\Controller\\PageController:FindPostId' => '?',
            'App\\Controller\\PageController:FindUserId' => '?',
            'App\\Controller\\PageController:allusers' => '?',
            'App\\Controller\\PageController:newPost' => '?',
            'App\\Controller\\PageController:newUser' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
