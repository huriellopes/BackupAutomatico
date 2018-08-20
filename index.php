<?php

// Inclui o arquivo da classe!
require_once __DIR__ . "/classe/Banco.php";

// Instância um objeto da classe
$backup = new Banco();

echo "===================================\n";
echo "Fazendo o Backup do Banco de dados!\n";
echo "===================================\n";

// Chama o método para executar
$backup->backup();

echo "==============================\n";
echo "Backup Finalizado com Sucesso!\n";
echo "==============================\n";