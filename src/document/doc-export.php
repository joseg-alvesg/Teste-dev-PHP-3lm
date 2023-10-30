<?php

require 'vendor/autoload.php';

use PHPJasper\PHPJasper;

$input = __DIR__ . '/../../src/document/relatorio.jrxml';
$out1 = __DIR__ . '/../../src/document/relatorio';

$jdbc_dir = __DIR__ . '/../../vendor/geekcom/phpjasper/bin/jasperstarter/jdbc/';
$options = [
  'format' => ['pdf', 'csv', 'docx'],
  'locale' => 'pt_BR',
  'params' => [],
  'db_connection' => [
      'driver' => 'generic',
      'username' => 'user1',
      'password' => '1234',
      'host' => 'localhost',
      'database' => 'db3lm',
      'port' => '3306',
      'jdbc_driver' => 'com.mysql.jdbc.Driver',
      'jdbc_url' => 'jdbc:mysql://localhost:3306/',
      'jdbc_dir' => $jdbc_dir,
  ],
];

$jasper = new PHPJasper();
$jasper->process(
    $input,
    $out1,
    $options
)->execute();
