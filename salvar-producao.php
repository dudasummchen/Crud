<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//pega o id
$id = $_GET['id'];

// montar o sql
$sql = "SELECT * FROM producao WHERE ProducaoID = $id ";
// executar o sql
$resultado = mysqli_query($conexao,$sql);
// pegar o dado
$dados = mysqli_fetch_assoc($resultado);

?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>
          <?php
          $sql=' SELECT * FROM funcionarios;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name= "FuncionarioID" required>
            <option value="">Selecione um Funcionário</option>
            <?php
            while ( $row = mysqli_fetch_assoc($resultado)) {
              $selected = ($row['FuncionarioID'] == $dados['FuncionarioID']) ? 'selected' : '';
           echo '<option '.$selected.' value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
          }
            ?>
            </select>
          <?php
          $sql=' SELECT * FROM produtos;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name= "ProdutoID" required>
            <option value="">Selecione um Produto</option>
            <?php
            while ( $row = mysqli_fetch_assoc($resultado)) {
              $selected = ($row['ProdutoID'] == $dados['ProdutoID']) ? 'selected' : '';
           echo '<option '.$selected.' value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';
          }
            ?>
            </select>
            <label>Data de Produção:</label>
            <input type="date" name="DataProducao" value="<?php echo $dados['DataProducao'];?>" required>
            <label>Data de Entrega:</label>
            <input type="date" name="DataEntrega" value="<?php echo $dados['DataEntrega'];?>" required>
            <button type="submit" class="btn btn-save">Salvar</button>
        </form>
        </div>
<?php
// include dos arquivox
include_once './include/footer.php';
?>