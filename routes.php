<?php

namespace App\Controllers;

return \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [AdminController::class, 'index']);
});