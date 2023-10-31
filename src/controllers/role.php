<?php

require_once __DIR__ . '/../models/role.php';
require_once __DIR__ . '/../../config.php';

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

// START APsubmitP
if (
  $_SERVER['REQUEST_METHOD'] === 'GET'
) {
  $roleModel = new Role($db);
  $roles = $roleModel->getRoles();
  include 'src/views/roleForm.php';
  include 'src/views/role.php';
}

// INSERT
if (
$_SERVER['REQUEST_METHOD'] === 'POST'
  && $_POST['btn'] === 'insert'
) {
  echo 'insert';
  $roleModel = new Role($db);
  $roleModel->create($_POST['description']);
  header('Location: /roles');
}

// UPDATE
if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
  && $_POST['btn'] === 'edit-role'
) {
  var_dump($_POST);
  $roleModel = new Role($db);
  $roleModel->update($_POST['id'], $_POST['description']);
  header('Location: /roles');
}

// DELETE
if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
  && $_POST['btn'] === 'delete-role'
) {
  $id = $_POST["id"];
  $roleModel = new Role($db);
  $roleModel->delete($id);
  header('Location: /roles');
}
