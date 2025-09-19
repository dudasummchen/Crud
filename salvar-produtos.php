<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//pega o id
$id = $_GET['id'];

//montar o sql
$sql = "SELECT * FROM produtos WHERE ProdutoID = $id;";

//executar o sql
$resultado = mysqli_query($conexao,$sql);

//pegar o dado
$dado = mysqli_fetch_assoc($resultado);
?>
   <main>
    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto" value="<?php echo $dado['Nome'];?>">
          <input type="number" placeholder="Preço" value="<?php echo $dado['Preco'];?>">
          <input type="number" placeholder="Peso (g)" value="<?php echo $dado['Peso'];?>">
          <textarea placeholder="Descrição"> <?php echo $dado['Descricao'];?></textarea>
          <select>
            <option value="">Categoria</option>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>