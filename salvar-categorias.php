<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//pega o id
$id = $_GET['id'];

//montar o sql
$sql = "SELECT * FROM categorias WHERE CategoriaID = $id;";

//executar o sql
$resultado = mysqli_query($conexao,$sql);

//pega o dado
$dado = mysqli_fetch_assoc($resultado);
?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/categorias.php" method="post">
          <h2>Cadastro de Categorias</h2>
          <input type="text" placeholder="Nome da Categoria" value="<?php echo $dado['Nome'];?>">
          <textarea placeholder="Descrição"><?php echo $dado ['Descricao'];?></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
