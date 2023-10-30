<?php
$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case '/':
        require 'src/views/index.php';
    // require 'src/controllers/employeeForm.php';
    require 'src/controllers/employees.php';
        // break;
    // case '/employees':
        // break;
    // case '/insert-employee':
        break;
    case '/report':
        require 'src/document/doc-export.php';
        break;
    case '/delete-employee':
        require __DIR__ . '/views/delete-employee.php';
        break;
    default:
        http_response_code(404);
        echo 'Página não encontrada';
        // require __DIR__ . '/views/404.php';
        break;
}
