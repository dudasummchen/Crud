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
        $sql = 'DELETE FROM funcionarios WHERE FuncionarioID = '.$id;
        //executar o SQL
        mysqli_query($conexao,$sql);
        //redirecionar a pagina
        header('Location: ../lista-funcionarios.php');
        break;
    
    case 'salvar':
        $nome = $_POST['Nome'];
        $datanascimento = $_POST['Data_nascimento'];
        $email = $_POST['Email'];
        $salario = $_POST['Salario'];
         if ( empty($id)) {
             //INSERT
            $sql = "INSERT INTO funcionarios (Nome, Data_nascimento, Email, Salario) 
                  VALUES ('{$nome}', '{$datanascimento}', '{$email}', '{$salario}')";
            }else{
                //UPDATE
                $sql = "UPDATE funcionarios
                            SET Nome = '{$nome}',
                                 Data_nascimento = '{$datanascimento}',
                                 Email = '{$email}',
                                 Salario = '{$salario}'
                             WHERE FuncionarioID = $id";

            }

            mysqli_query($conexao,$sql);
            //redirecionar a pagina
            header('Location: ../lista-cargos.php');
          break;
    default:
        # code...
        break;
}
?>