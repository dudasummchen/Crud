<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];

// validacao
switch ($acao) {
    case 'excluir':
        //montar o sql
        $sql = 'DELETE FROM funcionarios WHERE FuncionarioID = '.$id;
        //executar o SQL
        mysqli_query($conexao,$sql);
        // redirecionar a pagina
        header('Location: ../lista-funcionarios.php');
        break;
    
    
    default:
        # code...
        break;
}
?>