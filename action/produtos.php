<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao e id VIA URL - Query String
$acao = $_GET['acao'];
$id = $_GET['id'];

// validacao
switch ($acao) {
    case 'excluir':
        //montar o sql
        $sql = 'DELETE FROM produtos WHERE ProdutoID ='.$id;
        //executar o SQL
        mysqli_query($conexao,$sql);
        //redirecionar a pagina
        header('Location: ../lista-produtos.php');
        break;

    default:
      #code
      break;
 }
 ?>