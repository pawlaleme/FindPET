<?php session_start(); 
if (!isset($_SESSION['idusuario'])) {
  echo "<script> alert('Acesso negado, efetue login para acessar esta página'); 
window.location = 'index.html';
</script>";
}
include '../BO/findpetBO.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
    <title>FindPET - Atualizar Perfil</title>

</head>
<body>
      <?php                    
            $resultado = buscarperfilativoBO($_SESSION['idusuario']);                          
            if($resultado->rowCount() > 0){
            while($registro = $resultado->fetch(PDO::FETCH_OBJ)) 
            {
      ?>
      <div class="sidebar">
      <div class="logo-details">
          <i class='bx bxs-heart-circle icon' ></i>
        </i>
          <div class="logo_name">FindPET</div>
          <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav-list">
       
        <li>
          <a href="dashboard.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
           <span class="tooltip">Dashboard</span>
        </li>
        <li>
         <a href="perfil.php">
           <i class='bx bx-user' ></i>
           <span class="links_name">Meu Perfil</span>
         </a>
         <span class="tooltip">Meu Perfil</span>
       </li>
     
     
       <li>
         <a href="ongs.html">
           <i class='bx bx-folder' ></i>
           <span class="links_name">ONG'S</span>
         </a>
         <span class="tooltip">ONG'S</span>
       </li>
       <li>
         <a href="#">
           <i class='bx bx-cart-alt' ></i>
           <span class="links_name">Itens para doação</span>
         </a>
         <span class="tooltip">Itens para doação</span>
       </li>
      
       <li>
        <a href="atualizar.php">
           <i class='bx bx-cog' ></i>
           <span class="links_name">Editar Perfil</span>
         </a>
         <span class="tooltip">Editar Perfil</span>
       </li>
       <li class="profile">
           <div class="profile-details">
             <!--<img src="profile.jpg" alt="profileImg">-->
             <div class="name_job">
               <div class="name">FindPET | UNISO </div>
               <div class="job">Paula Leme dos Santos</div>
             </div>
             
           </div>
           
          <form action="../Forms/processaTodosFormularios.php" method="POST">
            <button name="acao" value="logout"><i class='bx bx-log-out' id="log_out"></i></button>
          </form>

       </li>
       
      </ul>
    </div>

    <div class="containeratt">
        <div class="content">
          <div class="left-side">
            <div class="address details">
              <i class="fas fa-map-marker-alt"></i>
              
              <div class="profile-image">
                  <img class="fotoperfil" width="200px" src="../img/<?php echo $registro->foto; ?>.png" id="output"> 
              </div>
          &nbsp; &nbsp; 
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Nome</div>
            <div class="text-one"><?php echo $registro->nome; ?></div>
          </div>
              <div class="topic">Endereço</div>
              <div class="text-one"><?php echo $registro->cidade_usuario; ?></div>
              <div class="text-two"><?php echo $registro->estado; ?></div>
            </div>
            
            <div class="phone details">
              <i class="fas fa-phone-alt"></i>
              <div class="topic">Telefone</div>
              <div class="text-one"><?php echo $registro->contato; ?></div>
            </div>
            <div class="email details">
              <i class="fas fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text-one"><?php echo $registro->email; ?></div>
            </div>
            
          </div>
          <div class="right-side">
            <div class="topic-text">Atualizar informações do perfil</div>
            <p>É essencial manter seus dados atualizados, para melhor funcionamento da plataforma</p>
          <form action="../Forms/processaTodosFormularios.php" enctype="multipart/form-data" method="POST">
            
          <input type="hidden" name="token" value="<?php echo $registro->foto; ?>">
          
            <div class="input-box">
              <label for='nome'>Nome</label>
              <input type="text" placeholder="Nome" name="nome" value="<?php echo $registro->nome; ?>">
            </div>
            <div class="input-box">              
              <label for='user'>E-mail</label>
              <input type="text" placeholder="E-mail" name="email" value="<?php echo $registro->email; ?>">
            </div>
              <div class="input-box">                
                <label for='user'>Descrição</label>
                <input type="text" placeholder="Bio" name="desc" value="<?php echo $registro->descricao_usuario; ?>">
              </div>
              
              <div class="input-box">                
                <label for='contato'>Telefone para contato</label>
                <input type="text" placeholder="Contato" name="contato" value="<?php echo $registro->contato; ?>">
              </div>

              <div class="input-box"> 
                <label for='Data'>Data de nascimento</label>
                <input type='date' name='datanasc' title='Data de Nascimento' value="<?php echo $registro->datanasc; ?>">
                <span id='valida' class='i i-close'></span>
            </div>

              <div class="input-box">                
                <label for='user'>Cidade</label>
                <input type="text" placeholder="Bio" name="cidade" value="<?php echo $registro->cidade_usuario; ?>">
              </div>

              <div class="input-box">
              <?php $estadocorreto = $registro->estado;?>                               
                <label for='estado'>Estado</label>
                <select id="estado" name="estado">
                    <option value="AC" <?php if($estadocorreto == "AC"){ echo "selected"; } ?>>Acre</option>
                    <option value="AL" <?php if($estadocorreto == "AL"){ echo "selected"; } ?>>Alagoas</option>
                    <option value="AP" <?php if($estadocorreto == "AP"){ echo "selected"; } ?>>Amapá</option>
                    <option value="AM" <?php if($estadocorreto == "AM"){ echo "selected"; } ?>>Amazonas</option>
                    <option value="BA" <?php if($estadocorreto == "BA"){ echo "selected"; } ?>>Bahia</option>
                    <option value="CE" <?php if($estadocorreto == "CE"){ echo "selected"; } ?>>Ceará</option>
                    <option value="DF" <?php if($estadocorreto == "DF"){ echo "selected"; } ?>>Distrito Federal</option>
                    <option value="ES" <?php if($estadocorreto == "ES"){ echo "selected"; } ?>>Espírito Santo</option>
                    <option value="GO" <?php if($estadocorreto == "GO"){ echo "selected"; } ?>>Goiás</option>
                    <option value="MA" <?php if($estadocorreto == "MA"){ echo "selected"; } ?>>Maranhão</option>
                    <option value="MT" <?php if($estadocorreto == "MT"){ echo "selected"; } ?>>Mato Grosso</option>
                    <option value="MS" <?php if($estadocorreto == "MS"){ echo "selected"; } ?>>Mato Grosso do Sul</option>
                    <option value="MG" <?php if($estadocorreto == "MG"){ echo "selected"; } ?>>Minas Gerais</option>
                    <option value="PA" <?php if($estadocorreto == "PA"){ echo "selected"; } ?>>Pará</option>
                    <option value="PB" <?php if($estadocorreto == "PB"){ echo "selected"; } ?>>Paraíba</option>
                    <option value="PR" <?php if($estadocorreto == "PR"){ echo "selected"; } ?>>Paraná</option>
                    <option value="PE" <?php if($estadocorreto == "PE"){ echo "selected"; } ?>>Pernambuco</option>
                    <option value="PI" <?php if($estadocorreto == "PI"){ echo "selected"; } ?>>Piauí</option>
                    <option value="RJ" <?php if($estadocorreto == "RJ"){ echo "selected"; } ?>>Rio de Janeiro</option>
                    <option value="RN" <?php if($estadocorreto == "RN"){ echo "selected"; } ?>>Rio Grande do Norte</option>
                    <option value="RS" <?php if($estadocorreto == "RS"){ echo "selected"; } ?>>Rio Grande do Sul</option>
                    <option value="RO" <?php if($estadocorreto == "RO"){ echo "selected"; } ?>>Rondônia</option>
                    <option value="RR" <?php if($estadocorreto == "RR"){ echo "selected"; } ?>>Roraima</option>
                    <option value="SC" <?php if($estadocorreto == "SC"){ echo "selected"; } ?>>Santa Catarina</option>
                    <option value="SP" <?php if($estadocorreto == "SP"){ echo "selected"; } ?>>São Paulo</option>
                    <option value="SE" <?php if($estadocorreto == "SE"){ echo "selected"; } ?>>Sergipe</option>
                    <option value="TO" <?php if($estadocorreto == "TO"){ echo "selected"; } ?>>Tocantins</option>
                </select>
            </div>
                
              <div class="input-box">
                <label for='senha'>Insira sua senha</label>
                <input type="password" placeholder="Senha" name="senha" value="">
              </div>

              <div class="input-box">
                <label for='senha2'>Repita a Senha</label>
                <input type="password" placeholder="Repita sua senha" name="senha2" value="">
              </div>

              <div class="input-box">
                <label for='foto'>Escolha uma foto</label>
                <input type="file" name="foto" onchange="loadFile(event)"/>
              </div>
                

              <input type="hidden" value="<?php echo $_SESSION['idusuario']; ?>" name="idusuarioedt">

            <div class="input-box message-box" aria-placeholder="">
              
            </div>
            <div class="button">
              <input type="submit" name="acao" value="editarusuario" >
            </div>
          </form>
        </div>
        </div>
      </div>
      <?php } } ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/javascript.js"></script>
</body>
</html>
