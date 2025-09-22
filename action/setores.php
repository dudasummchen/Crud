<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// validacao
switch ($acao) {
    case 'excluir':
        //montar o sql
        $sql = 'DELETE FROM setor WHERE SetorID = '.$id;
        //executar o SQL
        mysqli_query($conexao,$sql);
        //redirecionar a pagina
        header('Location: ../lista-setores.php');
        break;
    
    case 'salvar':
        $nome = $_POST['nome'];
        $andar = $_POST['andar'];
        $cor = $_POST['cor'];
        if (empty($id)) {
            // INSERT
            $sql = "INSERT INTO setor (Nome, Andar, Cor)
                    VALUES ('{$nome}', '{$andar}', '{$cor}')";
        } else {
            // UPDATE
            $sql = "UPDATE setor
                       SET Nome = '{$nome}',
                           Andar = '{$andar}',
                           Cor = '{$cor}'
                     WHERE SetorID = $id;";



                     
        }

            mysqli_query($conexao,$sql);
            //redirecionar a pagina
            header('Location: ../lista-setores.php');
        break;
    default:
        # code...
        break;
}
?>