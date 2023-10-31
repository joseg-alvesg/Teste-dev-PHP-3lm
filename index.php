<?php

$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case '/':
        require 'src/views/index.php';
        require 'src/controllers/employees.php';
        break;
    case '/report':
        require 'src/document/doc-export.php';
        break;
    case '/roles':
        require 'src/views/index.php';
        require 'src/controllers/role.php';
        break;
    default:
        http_response_code(404);
        echo '<h1>Página não encontrada</h1> <a href="/">Voltar</a>';
        break;
}
