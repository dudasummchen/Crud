<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Funcionario</th>
              <th>Cliente</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = ' SELECT pr.ProducaoID , p.Nome AS "NomeProduto" , f.Nome AS "NomeFuncionario" , c.Nome AS "NomeCliente" 
                    FROM producao AS pr 
                    LEFT JOIN produtos AS p ON pr.ProdutoID = p.ProdutoID 
                    LEFT JOIN funcionarios AS f ON pr.FuncionarioID = f.FuncionarioID 
                    LEFT JOIN clientes AS c ON pr.ClienteID = c.ClienteID;';
          $resultado = mysqli_query($conexao,$sql);
          
          while ( $dado = mysqli_fetch_assoc($resultado)) {
          ?>
          <tr>
            <td><?php echo $dado['ProducaoID'];?></td>
            <td><?php echo $dado['NomeProduto'];?></td>
            <td><?php echo $dado['NomeFuncionario'];?></td>
            <td><?php echo $dado['NomeCliente'];?></td>
            <td>
            <a href="salvar-producao.php?id=<?php echo $dado['ProducaoID']?>" class="btn btn-edit">Editar</a>
            <a href="./action/producao.php?&acao=excluir&id=<?php echo $dado['ProducaoID']?> " class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <?php
          }
          ?>
            
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>