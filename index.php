<?php

require_once __DIR__ . "/classe/Banco.php";

$backup = new Banco();

echo "===================================\n";
echo "Fazendo o Backup do Banco de dados!\n";
echo "===================================\n";
$backup->backup();
echo "==============================\n";
echo "Backup Finalizado com Sucesso!\n";
echo "==============================\n";