<?php

// Linka
require_once __DIR__ . "/Classe/Banco.php";

// Instância um objeto da classe
$backup = new Classe\Banco();

echo "****************************************\n";
echo "*** Sistema de Backup Automático *******\n";
echo "*** Author.....: Huriel Lopes **********\n";
echo "****************************************\n";

// Chama o método para executar
echo "Aguarde um momento....\n";
echo "****************************************\n";
$backup->backup();

echo "****************************************\n";
echo "**** Backup Finalizado com Sucesso *****\n";
echo "****************************************\n";