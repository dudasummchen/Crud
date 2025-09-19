<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $sql = 'SELECT p.ProdutoID, p.Nome"NomeProduto", c.Nome"NomeCategoria", 
            p.Preco FROM produtos AS p INNER JOIN categorias AS c ON p.ProdutoID = c.CategoriaID;';
            $resultado = mysqli_query($conexao,$sql);
           
            while ( $dado = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
            <td> <?php echo $dado['ProdutoID'];?></td>
            <td> <?php echo $dado['NomeProduto'];?></td>
            <td> <?php echo $dado['NomeCategoria'];?></td>
            <td> R$ <?php echo $dado['Preco'];?></td>
            <td>
            <a href="salvar-produtos.php?id=<?php echo $dado['ProdutoID'];?>" class="btn btn-edit">Editar</a>
            <a href="./action/produtos.php?&acao=excluir&id=<?php echo $dado['ProdutoID']?> " class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <?php
            }
            ?>
          

        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>