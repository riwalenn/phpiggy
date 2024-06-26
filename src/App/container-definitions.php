<?php

declare(strict_types=1);

use App\Services\ReceiptService;
use App\Services\TransactionService;
use Framework\Database;
use Framework\Container;
use Framework\TemplateEngine;
use App\Config\Paths;
use App\Services\ValidatorService;
use App\Services\UserService;

return [
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn() => new ValidatorService(),
    Database::class => fn() => new Database(
        $_ENV['DB_DRIVER'],
        [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME']
        ], $_ENV['DB_USER'], $_ENV['DB_PASS']),
    UserService::class => function(Container $container) {
        $db = $container->get(Database::class);

        return new UserService($db);
    },
    TransactionService::class => function(Container $container) {
    $database = $container->get(Database::class);

    return new TransactionService($database);
    },
    ReceiptService::class => function(Container $container) {
    $database = $container->get(Database::class);
    return new ReceiptService($database);
    }
];