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

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

  
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


    <title> MEU PERFIL</title>

    <?php                    
            $resultado = buscarperfilativoBO($_SESSION['idusuario']);                          
            if($resultado->rowCount() > 0){
            while($registro = $resultado->fetch(PDO::FETCH_OBJ)) 
            {
      ?>

        <div class="container">
            <div class="profile">
                <div class="profile-image">          
                  <img class="fotoperfil" width="200px" src="../img/<?php echo $registro->foto; ?>.png" alt="">          
                </div>          
                <div class="profile-user-settings">
                    <h5 class="profile-user-name"><?php echo $registro->nome; ?></h5>
                    <button onclick="location.href='atualizar.php'" class="btn profile-edit-btn" >Editar Perfil</button>
                </div>          
                <div class="profile-stats">
                    <ul>                    
                      <li><span class="profile-stat-count"><i class="material-icons">call</i></span><?php echo $registro->contato; ?></li>
                      <li><span class="profile-stat-count"><?php echo $registro->cidade_usuario; ?></span> - <?php echo $registro->estado; ?></li>
                    </ul>          
                </div>          
                <div class="profile-bio">          
                  <p class="bio"><span class="profile-real-name"></span><?php echo $registro->descricao_usuario; ?></p>
                </div>          
           
            </div>
            <hr size="2" width="100%">

        <div class="botoesdashperfil">
          <ul class="nav-links">
            <li><a href="perfil.php">PERDIDOS</a></li>
            <li class="center"><a href="Usuarioencontrados.php">ENCONTRADOS</a></li>
            <li class="upward"><a href="Usuariomeadota.php">ADOÇÃO</a></li>
          </ul>    
        </div>
        


       

         <div class="container2">
         
          <h1 class="tituloperfil">Meus Pets Encontrados</h1>
          <div class="containerpets">
      <?php    
          $resultadoencontrados = buscarEncontradoUsuarioAtivoDAO($_SESSION['idusuario']);
          if($resultadoencontrados->rowCount() > 0){
            while($registroencontrados = $resultadoencontrados->fetch(PDO::FETCH_OBJ)){  
      ?>
          <div class="boxpets">
          <div class="imagepets">
                <img width="200px" src="../img/<?php echo $registroencontrados->foto; ?>.png">
              </div>
              <div class="name_cidade"><?php echo $registroencontrados->especie; ?> <?php echo $registroencontrados->raca; ?> | <?php echo $registroencontrados->cor; ?></div>
              <div class="name_cidade"><?php echo $registroencontrados->cidade; ?> - <?php echo $registroencontrados->estado; ?></div>
              <div class="containerDescricao">
                <p><?php echo $registroencontrados->descricao; ?></p>
              </div>
              <div class="btns">
                <div>
                <a href="editarencontrado.php?idpetencontrado=<?php echo $registroencontrados->idpetencontrado; ?>"><button><i class='bx bx-pen' ></i>Editar</button></a>
                </div>
                <form action="../Forms/processaTodosFormularios.php?idpetencontrado=<?php echo $registroencontrados->idpetencontrado; ?>" method="POST">
                    <button name="acao" value="excluirencontrado"><i class='bx bx-trash' ></i>Excluir</button>
                  </form>
                <div>                
                  <label><?php echo "Publicado em: ".(new DateTime($registroencontrados->dataencontro))->format('d/m/Y').""; ?></label>                         
                  <label>
                      <?php
                          $statuschange = $registroencontrados->dataencontro_dono;
                          if($statuschange == null){
                            echo "Dono não encontrado :(";
                          }
                          else{
                            echo "Dono encontrado :)";
                          }  
                      ?>    
                  </label> 
                </div>
              </div>
          </div>  
      <?php
          }
        }
        else{

          echo "<img src='../midia/notfound.png' class='notfoundpic'>";

        }
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
          
          
          <?php } }  ?>
          
            </body>
      </html>