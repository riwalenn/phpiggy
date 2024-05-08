<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts;
use Framework\TemplateEngine;

class TemplateDataMiddleware implements Contracts\MiddlewareInterface {
    public function __construct(private TemplateEngine $view) {}

    public function process(callable $next)
    {
        $this->view->addGlobal('title', 'Expense Tracking App');

        $next();
    }
}