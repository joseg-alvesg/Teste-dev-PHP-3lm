<?php

require_once __DIR__ . '/../models/employees.php';
require_once __DIR__ . '/../models/role.php';
require_once __DIR__ . '/../../config.php';

$is_dev = true;

// debug GLOBALS
function debug()
{
    global $is_dev;

    if ($is_dev) {
        $debug_arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $line = $debug_arr[0]['line'];
        $file = $debug_arr[0]['file'];

        header('Content-Type: text/plain');

        echo "linha: $line\n";
        echo "arquivo: $file\n\n";
        echo 'BTN:' . $_POST['btn'] . "\n\n";
        print_r(array('GET' => $_GET, 'POST' => $_POST, 'SERVER' => $_SERVER, 'GLOBALS' => $GLOBALS));
        exit;
    }
}

// START APP
if (
    $_SERVER['REQUEST_METHOD'] === 'GET'
) {
    $roleModel = new Role($db);
    $employeeModel = new Employee($db);
    $roles = $roleModel->getRoles();
    $employees = $employeeModel->getEmployees();
    include 'src/views/employeeForm.php';
    include 'src/views/employees.php';
}


// INSERT
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && $_POST['btn'] === 'insert'
) {
    // debug();
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $role = $_POST['role'];
    $salary = $_POST['salary'];
    $employeeModel = new Employee($db);
    $employeeModel->insert($firstName, $lastName, $birthDate, $role, $salary);
    header('Location: /');
}

// UPDATE
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && $_POST['btn'] === 'edit'
) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $role = $_POST['role'];
    $salary = $_POST['salary'];
    $id = $_POST['id'];
    $employeeModel = new Employee($db);
    $employeeModel->update($id, $firstName, $lastName, $birthDate, $role, $salary);
    header('Location: /');
}

// DELETE
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && $_POST['btn'] === 'delete'
) {
    $id = $_POST['id'];
    $employeeModel = new Employee($db);
    $employeeModel->delete($id);
    header('Location: /');
}
