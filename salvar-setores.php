<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//pega o id
$id = $_GET['id'];

//montar o sql
$sql = "SELECT * FROM  setor WHERE SetorID = $id;";

//executar o sql
$resultado = mysqli_query($conexao,$sql);

//pega o dado
$dado = mysqli_fetch_assoc($resultado);
?>
  <main>

         <!-- Telas CRUD -->
    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/setores.php">
        <input type="hidden" name="acao" value="salvar">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <h2>Cadastro de Setores</h2>
          <input type="text" name="nome" placeholder="Nome do Setor" value="<?php echo $dado['Nome'];?>">
          <input type="text" name="andar" placeholder="Andar" value="<?php echo $dado['Andar'];?>">
          <input type="text" name="cor" placeholder="Cor" value="<?php echo $dado['Cor'];?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>