<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//pega o id
$id = $_GET['id'];

//montar o sql
$sql = "SELECT * FROM cargos WHERE CargoID = $id;";

//executar o sql
$resultado = mysqli_query($conexao,$sql);

//pega o dado
$dado = mysqli_fetch_assoc($resultado);
?>
  <main>

       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type="text" placeholder="Nome do Cargo" value="<?php echo $dado['Nome'];?>">
      <input type="number" placeholder="Teto Salarial" value="<?php echo $dado['TetoSalarial'];?>">
      <button type="submit">Salvar</button>
    </form>
  </div>



   
  </main>

  <?php 
 
  include_once './include/footer.php';
  ?>
