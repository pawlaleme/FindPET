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

       
        <div class="wrapper">
              <h2>Perdeu um pet? Nós ajudamos a encontrar!</h2>
              <div class="input-box">
                <form action="../Forms/processaTodosFormularios.php" enctype="multipart/form-data" method="POST">
                <label for='name'>Nome do Pet</label>
                <input type='text'  name='nome' title='Username' placeholder="Seu nome" />
                <span id='valida' class='i i-warning'></span>
              </p>
              <p class='field'>
                <label for='user'>Espécie</label>
                <input type='text' name='especie' title='Especie' placeholder="Espécie do Pet" />
                <span id='valida' class='i i-warning'></span>
              </p>

              <p class='field'>
                <label for='pass'>Raça</label>
                <input type='text' name='raca' title='Raça' placeholder="Raça do Pet"/>
                <span id='valida' class='i i-close'></span>
              </p>

              <p class='field'>
                <label for='pass'>Cor</label>
                <input type='text' name='cor' title='Cor' placeholder="Cor do Pet"/>
                <span id='valida' class='i i-close'></span>
              </p>
              
              <p class='field'>
                <label for='user'>Descreva seu pet em algumas palavras e deixe informações importantes</label>
                <input type='text' name='desc' title='Description' placeholder="Fale sobre seu pet" />
                <span id='valida' class='i i-warning'></span>
              </p>
              
              <p class='field'>
                <label for='user'>Cidade</label>
                <input type='text' name='cidade' title='City' placeholder="Cidade onde ele desapareceu" />
                <span id='valida' class='i i-warning'></span>
              </p>

              <p class='field'>
              <label for='estado'>Estado</label>
                <div class="privacy">
                  <i class="fas fa-a"></i>      
                    <select id="estado" name="estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>  
                  </div>
                  </p>
              
          </div>


         
          <div class="bottom">
            <ul class="icons">
              <p class="">            
                <label>Escolha uma Foto do seu pet: </label>
                <!-- <img src="" width="200px" id="output" /> -->
                  <div class="">
                    <input type="file" name="foto"  class="item-img file" onchange="loadFile(event)"/>
                  </div>
                </p>
            </ul>
            <div class="">
              <button type="submit" name="acao" value="cadastrarpetperdido">Publicar</button>
            </div>
          </div>

        </form>
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
         <a href="ongs.html">
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
    <div class="botoesdash">
      <ul class="nav-links">
        <li><a href="encontrados.php"> ENCONTRADOS</a></li>
        <li class="center"><a href="dashboard.php"> PERDIDOS</a></li>
        <li class="upward"><a href="meadota.php"> ADOÇÃO</a></li>
      </ul>
    
</div>
    &emsp; &emsp;
</div>
    <h1 class="tituloperfil">PETS PERDIDOS</h1>

    <div class="containerpets">
        <?php  

            $resultadoperdidos = buscarPerdidoGeralBO();
            if($resultadoperdidos->rowCount() > 0){
              while($registroperdidos = $resultadoperdidos->fetch(PDO::FETCH_OBJ)){

        ?>          
            <div class="boxpets">
                <div class="imagepets">
                  <img width="200px" src="../img/<?php echo $registroperdidos->foto; ?>.png">
                </div>
                <div class="name_pet"><?php echo $registroperdidos->nome; ?></div>
                <div class="name_cidade"><?php echo $registroperdidos->cidade; ?> - <?php echo $registroperdidos->estado; ?></div>
                <div class="containerDescricao">
                  <p><?php echo $registroperdidos->descricao; ?></p>
                </div>
                <div class="btns">
                  <?php

                    if($_SESSION['idusuario'] == $registroperdidos->idusuario){
                  
                  ?>
                    <a href="perfil.php"><button>Acessar seu perfil</button></a>
                  <?php 
                    }else
                    {
                  ?>
                    <a href="OutroUsuarioperfil.php?idoutrousuario=<?php echo $registroperdidos->idusuario; ?>"><button>Entrar em contato</button></a>  
                  <?php 
                    }
                  ?>                  
                    <div>                
                      <label><?php echo "Publicado em: ".(new DateTime($registroperdidos->datasumido))->format('d/m/Y').""; ?></label>  
                      <label>
                      <?php
                          $statuschange = $registroperdidos->dataencontro;
                          if($statuschange == null){
                            echo "Perdido :(";
                          }
                          else{
                            echo "Encontrado :)";
                          }  
                      ?>    
                  </label>           
                  </div>       
                </div>
            </div>

        <?php
                    }}
        ?>
    </div>

            
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
