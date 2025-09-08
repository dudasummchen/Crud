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
              <th>Quantidade</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
        <?php
         $sql = 'SELECT pr.ProducaoID , p.Nome"NomeProduto" , f.Nome"NomeFuncionario" , c.Nome"NomeCliente" FROM producao AS
          pr INNER JOIN produtos AS p ON pr.ProdutoID = p.ProdutoID INNER JOIN 
          funcionarios AS f ON pr.ProdutoID = f.FuncionarioID INNER JOIN clientes AS c ON pr.ProdutoID = c.ClienteID;';
         $resultado = mysqli_query($conexao,$sql);
         
         while ( $dado = mysqli_fetch_assoc($resultado)) {
         ?>
         <tr>
           <td><?php echo $dado['ProducaoID'];?></td>
           <td><?php echo $dado['NomeProduto'];?></td>
           <td>  <?php echo $dado['NomeFuncionario'];?></td>
           <td>  <?php echo $dado['NomeCliente'];?></td>
           <td>
             <a href="salvar-cargos.php?id=" class="btn btn-edit">Editar</a>
             <a href="#" class="btn btn-delete">Excluir</a>
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