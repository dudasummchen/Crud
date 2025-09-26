<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

//pega o id
$id = $_GET['id'];

//montar o sql
$sql = "SELECT * FROM funcionarios WHERE FuncionarioID = $id";

//executar o sql
$resultado = mysqli_query($conexao,$sql);

//pega o dado
$dado = mysqli_fetch_assoc($resultado);
?>
  <main>

         <!-- Telas CRUD -->
         <div id="funcionarios" class="tela">
        <form class="crud-form" action="./action/funcionarios.php" method="post">
          <input type="hidden" name="acao" value="salvar">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <h2>Cadastro de Funcionários</h2>
          <input type="text" name="Nome" placeholder="Nome" value="<?php echo $dado['Nome'];?>">
          <input type="date" name="Data_nascimento" placeholder="Data de Nascimento" value="<?php echo $dado['DataNascimento'];?>">
          <input type="email" name="Email" placeholder="Email" value="<?php echo $dado['Email'];?>">
          <input type="number" name="Salario" placeholder="Salario" value="<?php echo $dado['Salario'];?>">
          <select name="sexo" required>
            <option value=""?>- Sexo -</option>
            <option value="M" <?php if ($dado['Sexo'] == "M") { echo 'selected'; }?> >Masculino</option>
            <option value="F" <?php if ($dado['Sexo'] == "F") { echo 'selected'; }?> >Feminino</option>
          </select>
          <input type="text" placeholder="CPF" value="<?php echo $dado['CPF'];?>">
          <input type="text" placeholder="RG" value="<?php echo $dado['RG'];?>">
        
          <?php
          $sql = 'SELECT* FROM cargos;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
         <select name="" id="">
          <option value=""> - Selecione - </option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['CargoID'] == $dado['CargoID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['CargoID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>
 
            <?php
          $sql = 'SELECT* FROM setor;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option value=""> - Selecione - </option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['SetorID'] == $dados['SetorID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['SetorID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>
         
          <button type="submit">Salvar</button>
        </form>
      </div>
 
 
   
  </main>
 
  <?php
  // include dos arquivox
  include_once './include/footer.php'
  ?>