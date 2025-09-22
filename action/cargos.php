<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao e id VIA URL - Query String
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// validacao
switch ($acao) {
    case 'excluir':
        //montar o sql
        $sql = 'DELETE FROM cargos WHERE CargoID ='.$id;
        //executar o SQL
        mysqli_query($conexao,$sql);
        //redirecionar a pagina
        header('Location: ../lista-cargos.php');
        break;

    case 'salvar':
        $nome = $_POST['nome'];
        $tetosalarial = $_POST['tetosalarial'];
         if ( empty($id)) {
             //INSERT
            $sql = "INSERT INTO cargos (Nome, TetoSalarial) 
                  VALUES ('$nome', $tetosalarial);";
            }else{
                //UPDATE
                $sql = "UPDATE cargos 
                       SET Nome = '$nome', 
                       TetoSalarial = $tetosalarial
                        WHERE CargoID = $id";



            }

            mysqli_query($conexao,$sql);
            //redirecionar a pagina
            header('Location: ../lista-cargos.php');
        break;
    default:
      #code
      break;
 }
 ?>