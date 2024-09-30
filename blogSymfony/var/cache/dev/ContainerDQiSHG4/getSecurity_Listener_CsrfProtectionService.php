<?php

namespace ContainerDQiSHG4;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Listener_CsrfProtectionService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.listener.csrf_protection' shared service.
     *
     * @return \Symfony\Component\Security\Http\EventListener\CsrfProtectionListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-http'.\DIRECTORY_SEPARATOR.'EventListener'.\DIRECTORY_SEPARATOR.'CsrfProtectionListener.php';

        return $container->privates['security.listener.csrf_protection'] = new \Symfony\Component\Security\Http\EventListener\CsrfProtectionListener(($container->privates['security.csrf.token_manager'] ?? $container->load('getSecurity_Csrf_TokenManagerService')));
    }
}
