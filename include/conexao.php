<?php
// constantes de dados do banco
define('DBHOST','localhost'); // servidor
define('DBUSER','root'); // usuario do banco
define('DBPASS',''); // senha do banco 
define('DBBASE','empresa'); // base de dados

// faz a conexao com o banco de dados com base nos dados de conexao
$conexao = mysqli_connect(DBHOST,DBUSER,DBPASS,DBBASE);