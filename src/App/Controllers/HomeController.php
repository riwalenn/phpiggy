<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Services\TransactionService;
use Framework\TemplateEngine;
use App\Config\Paths;

class HomeController
{
    public function __construct(
        private TemplateEngine $view,
        private TransactionService $transactionService
    ) {}

    public function home() {
        $page       = $_GET['page'] ?? 1;
        $page       = (int) $page;
        $length     = 3;
        $offset     = ($page - 1) * $length;
        $searchTerm = $_GET['search'] ?? null;

        [$transactions, $count] = $this->transactionService->getUserTransactions(
            $length,
            $offset
        );

        $lastPage = ceil($count / $length);

        $pages = $lastPage ? range(1, $lastPage) : [];

        $pageLinks = array_map(fn($pageNum) => http_build_query([
            'page'   => $pageNum,
            'search' => $searchTerm
        ]), $pages);

        echo $this->view->render("index.php", [
            'transactions'      => $transactions,
            'currentPage'       => $page,
            'previousPageQuery' => http_build_query([
                'page'   => $page - 1,
                'search' => $searchTerm
            ]),
            'lastPage'          => $lastPage,
            'nextPageQuery'     => http_build_query([
                'page'   => $page + 1,
                'search' => $searchTerm
            ]),
            'pageLinks'     => $pageLinks,
            'searchTerm'    => $searchTerm
        ]);
    }
}