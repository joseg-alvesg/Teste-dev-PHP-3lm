<?php

require 'vendor/autoload.php';

$env = parse_ini_file('.env');

$dbHost = $env['DB_HOST'];
$dbUser = $env['DB_USER'];
$dbPass = $env['DB_PASS'];
$dbName = $env['DB_NAME'];

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
      'username' => $dbUser,
      'password' => $dbPass,
      'host' => $dbHost,
      'database' => $dbName,
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

echo '
  <h1>Relatorio gerado com sucesso</h1>
  <a href="/">Voltar</a>
';
