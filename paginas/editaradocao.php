<?php session_start(); 
if (!isset($_SESSION['idusuario'])) {
  echo "<script> alert('Acesso negado, efetue login para acessar esta página'); 
window.location = 'index.html';
</script>";
}
include '../BO/findpetBO.php';
?>



<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="pt-br" class="htmlpets">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script type="text/javascript" src="../js/javascript.js"></script>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body class="bdashboard">
  
    <header>
    <?php                    
            $resultado = editaradocaoPorIDDAO($_GET['idpetadocao']);                          
            if($resultado->rowCount() > 0){
            while($registro = $resultado->fetch(PDO::FETCH_OBJ)) 
            {
      ?>
       
      <div class="wrapper">
        <h2>Editar Adoção:</h2>
        <div class="input-box">
          <form action="../Forms/processaTodosFormularios.php" enctype="multipart/form-data" method="POST">
            
          
            <input type="hidden" name="idpetadocao" value="<?php echo $_GET['idpetadocao']; ?>">
            <input type="hidden" name="token" value="<?php echo $registro->foto; ?>">
            
            
            <label for='status'>Status</label>                
                <?php $statuscorreto = $registro->data_adotado;?> 
                <select id="status" name="status">
                    <option value="disp" <?php if($statuscorreto == null){ echo "selected"; } ?>>Disponível</option>
                    <option value="adopt" <?php if($statuscorreto != null){ echo "selected"; } ?>>Adotado</option>
                </select>

          <label for='name'>Nome do Pet</label>
          <input type='text'  name='nome' title='Username' placeholder="Seu nome" value="<?php echo $registro->nome; ?>"/>
          <span id='valida' class='i i-warning'></span>
        </p>
        <p class='field'>
          <label for='user'>Espécie</label>
          <input type='text' name='especie' title='Especie' placeholder="Espécie do Pet" value="<?php echo $registro->especie; ?>"/>
          <span id='valida' class='i i-warning'></span>
        </p>

        <p class='field'>
          <label for='pass'>Raça</label>
          <input type='text' name='raca' title='Raça' placeholder="Raça do Pet" value="<?php echo $registro->raca; ?>"/>
          <span id='valida' class='i i-close'></span>
        </p>
        
        <p class='field'>
          <label for='user'>Descreva seu pet em algumas palavras e deixe informações importantes</label>
          <input type='text' name='desc' title='Description' placeholder="Fale sobre seu pet" value="<?php echo $registro->descricao; ?>"/>
          <span id='valida' class='i i-warning'></span>
        </p>
        
        <p class='field'>
          <label for='user'>Cidade</label>
          <input type='text' name='cidade' title='City' placeholder="Cidade onde ele desapareceu" value="<?php echo $registro->cidade; ?>"/>
          <span id='valida' class='i i-warning'></span>
        </p>

        <p class='field'>
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
            </p>        
   


   
    <div class="bottom">
      <ul class="icons">
        <p class="">            
          <label>Escolha uma Foto do seu pet: </label>
          <img src="../img/<?php echo $registro->foto; ?>.png" width="200px" id="output" />
            <div class="">
              <input type="file" name="foto"  class="item-img file" onchange="loadFile(event)"/>
            </div>
          </p>
      </ul>



      <div class="">
        <button type="submit" name="acao" value="editarpetadocao">Editar</button>
      </div>
    </div>
            </div>
  </form>

  <?php } } ?>
</div>
  </div>
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
         
         <span class="tooltip">Mensagens</span>
       </li>
     
       <li>
         <a href="#">
           <i class='bx bx-folder' ></i>
           <span class="links_name">ONG'S</span>
         </a>
         <span class="tooltip">ONG's</span>
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
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/javascript.js"></script>    


            <script>
              let sidebar = document.querySelector(".sidebar");
              let closeBtn = document.querySelector("#btn");
              let searchBtn = document.querySelector(".bx-search");
            
              closeBtn.addEventListener("click", ()=>{
                sidebar.classList.toggle("open");
                menuBtnChange();//calling the function(optional)
              });
            
              searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
              });
            
              // following are the code to change sidebar button(optional)
              function menuBtnChange() {
               if(sidebar.classList.contains("open")){
                 closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
               }else {
                 closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
               }
              }
              </script>
    
    
    
    
      </body>
</html>
