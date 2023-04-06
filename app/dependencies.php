<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Twig\Environment;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c): LoggerInterface {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        // Service factory for the ORM
        Manager::class => function (ContainerInterface $c): Manager {
            $settings = $c->get(SettingsInterface::class);
            $dbSettings = $settings->get('db');

            $capsule = new Manager;

            $capsule->addConnection($dbSettings);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        },
        Environment::class => function (ContainerInterface $c): Environment {
            $settings = $c->get(SettingsInterface::class);
            $appEnvSetting = $settings->get('app_env');

            $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../view');
            $twig = new Twig\Environment($loader, [
                __DIR__ . '/../var/cache'
            ]);

            if ($appEnvSetting === 'DEVELOPMENT') {
                $twig->enableDebug();
            }

            return $twig;
        }
    ]);
};
