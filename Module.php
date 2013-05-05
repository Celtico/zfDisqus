<?php

namespace YogiDisqus;

use Zend\ModuleManager;

class Module implements ModuleManager\Feature\AutoloaderProviderInterface,
                        ModuleManager\Feature\ConfigProviderInterface,
                        ModuleManager\Feature\ViewHelperProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'yogiDisqus' => function ($sm) {
                    $config = $sm->getServiceLocator()->get('Configuration');
                    return new View\Helper\YogiDisqus($config['YogiDisqus']);
                }
            )
        );
    }
}
