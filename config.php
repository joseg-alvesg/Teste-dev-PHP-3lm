<?php

$env = parse_ini_file('.env');

$dbHost = $env['DB_HOST'];
$dbUser = $env['DB_USER'];
$dbPass = $env['DB_PASS'];
$dbName = $env['DB_NAME'];

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // teste de inserção de dados
    // for ($i = 1; $i <= 200; $i++) {
    //     $firstName = "Funcionário " . $i;
    //     $lastName = "Sobrenome " . $i;
    //     $birthDate = date('Y-m-d', strtotime('1990-01-01 + ' . $i . ' days'));
    //     $role = rand(1, 10); 
    //     $salary = 1000.00; 

    //     $sql = "INSERT INTO employees (firstName, lastName, birthDate, role, salary) VALUES (:firstName, :lastName, :birthDate, :role, :salary)";
    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(':firstName', $firstName);
    //     $stmt->bindParam(':lastName', $lastName);
    //     $stmt->bindParam(':birthDate', $birthDate);
    //     $stmt->bindParam(':role', $role);
    //     $stmt->bindParam(':salary', $salary);
    //     $stmt->execute();
    // }
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}
