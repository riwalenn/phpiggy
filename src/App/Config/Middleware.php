<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middleware;

function registerMiddleware(App $app) {
    $app->addMiddleware(Middleware\TemplateDataMiddleware::class);
}