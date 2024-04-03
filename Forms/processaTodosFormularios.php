<?php
	include_once '../BO/findpetBO.php';
    
    if($_POST["acao"] == "cadastrarusuario"){
		
		if(!empty($_POST["nome"]) && !empty($_POST["datanasc"]) && !empty($_POST["email"]) && !empty($_POST["senha"]) && !empty($_POST["senha2"]) && !empty($_POST["desc"]) && !empty($_POST["cidade"]) && !empty($_POST["estado"]) && ($_FILES['foto']['size'] > 0)){
                        
            $nome = $_POST["nome"];
			$datanasc = $_POST["datanasc"];
            $email = $_POST["email"];
			$senha = $_POST["senha"];
			$senha2 = $_POST["senha2"];		
			$desc = $_POST["desc"];	
			$contato = $_POST["contato"];
			$cidade = $_POST["cidade"];
			$estado = $_POST["estado"];	
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');

			cadastrarusuarioBO($nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $token, $contato);						
		} 
		else {
			echo "<script> alert('Preencha todos os campos'); </script>";
			echo "<script> window.history.back() </script>";
		}
		
	}

	if($_POST["acao"] == "editarusuario") {
		session_start();
		if(!empty($_POST["nome"]) && !empty($_POST["datanasc"]) && !empty($_POST["email"]) && !empty($_POST["senha"]) && !empty($_POST["senha2"]) && !empty($_POST["desc"]) && !empty($_POST["cidade"]) && !empty($_POST["estado"])){
			
			$senha = $_POST["senha"];
			$senha2 = $_POST["senha2"];
			
			if($senha == $senha2){

				if(($_FILES['foto']['size'] > 0)){
					
					$idusuario = $_POST["idusuarioedt"];
					$nome = $_POST["nome"];
					$datanasc = $_POST["datanasc"];
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$senha2 = $_POST["senha2"];		
					$desc = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$contato = $_POST["contato"];
					$token = rand(15487,1045646);
					
					move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');

					editarusuarioBO($idusuario, $nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $token, $contato);
					
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/atualizar.php">';			
				
				}else{
					$token = $_POST['token'];
					$idusuario = $_POST["idusuarioedt"];
					$nome = $_POST["nome"];
					$datanasc = $_POST["datanasc"];
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$senha2 = $_POST["senha2"];		
					$desc = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$contato = $_POST["contato"];

					editarusuarioBO($idusuario, $nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $token, $contato);
					
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/atualizar.php">';
				}
			} else {

				echo "<script> alert('Senhas não coincidem'); </script>";
				echo "<script> window.history.back() </script>";
			}	
	
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

    
    
    if($_POST["acao"] == "logar"){
		
		if(!empty($_POST["email"]) && !empty($_POST["senha"])){

			$email = $_POST["email"];
			$senha = $_POST["senha"];

			session_start();
            logarBO($email, $senha);
			
		}else {
			echo "<script> alert('Preencha todos os campos corretamente.'); </script>";
			echo "<script> window.history.back() </script>";
		}
	
		
	}


	if($_POST["acao"] == "logout") {
		session_start();
				unset($_SESSION["idusuario"]);
				unset($_SESSION["email"]);
				unset($_SESSION["senha"]);
		session_destroy();

		echo "<script> alert('Usuário deslogado'); </script>";
		echo '<meta http-equiv = refresh content= "0; url = ../index.html">';

	}


    if($_POST["acao"] == "cadastrarpet"){
		session_start();
		if(!empty($_POST["nome"]) && !empty($_POST["especie"]) && !empty($_POST["raca"]) && !empty($_POST["desc"]) && ($_FILES['foto']['size'] > 0)){
                        
            $nome = $_POST["nome"];
			$especie = $_POST["especie"];
            $raca = $_POST["raca"];
			$descpet = $_POST["desc"];
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
            $idusuario = $_SESSION["idusuario"];

			cadastrarpetBO($nome, $especie, $raca, $descpet, $token, $idusuario);						
		} 
		else {
			echo "<script> alert('Preencha todos os campos'); </script>";
			echo "<script> window.history.back() </script>";
		}
		
	}

	if($_POST["acao"] == "editarpet") {
		session_start();
		if(!empty($_POST["nome"]) && !empty($_POST["desc"]) && !empty($_POST["raca"]) && !empty($_POST["especie"])){
			
				if(($_FILES['foto']['size'] > 0)){

					$idpet = $_POST["idpet"];
					$nome = $_POST["nome"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
					$descpet = $_POST["desc"];
					$token = rand(15487,1045646);
									
					move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');

					editarpetBO($idpet, $nome, $especie, $raca, $descpet, $token);
					
					echo "<script> window.alert(\"Pet editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/editarperfil.php">';			
				
				}else{
					$idpet = $_POST["idpet"];
					$token = $_POST['tokenusuario'];
					$nome = $_POST["nome"];
					$especie = $_POST["especie"];
           			$raca = $_POST["raca"];
					$descpet = $_POST["desc"];

					editarpetBO($idpet, $nome, $especie, $raca, $descpet, $token);
					
					echo "<script> window.alert(\"Pet editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/editarperfil.php">';
				}	
	
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}


	if($_POST["acao"] == "cadastrarpetadocao"){
		session_start();
		if(!empty($_POST["nome"]) && !empty($_POST["especie"]) && !empty($_POST["raca"]) && !empty($_POST["desc"]) && ($_FILES['foto']['size'] > 0) && !empty($_POST["cidade"]) && !empty($_POST["estado"])){
                        
            $nome = $_POST["nome"];
			$especie = $_POST["especie"];
            $raca = $_POST["raca"];
			$descpet = $_POST["desc"];
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
			$dataadoc = date('Y-m-d');
			$cidade = $_POST["cidade"];
			$estado = $_POST["estado"];	
            $idusuario = $_SESSION["idusuario"];

			cadastrarpetadocaoBO($nome, $especie, $raca, $descpet, $token, $dataadoc, $cidade, $estado, $idusuario);						
		} 
		else {
			echo "<script> alert('Preencha todos os campos obrigatórios'); </script>";
			echo "<script> window.history.back() </script>";
		}
		
	}



	if($_POST["acao"] == "cadastrarpetencontrado"){
		session_start();
		if(!empty($_POST["especie"]) && !empty($_POST["raca"]) && !empty($_POST["cor"]) && !empty($_POST["desc"]) && ($_FILES['foto']['size'] > 0) && !empty($_POST["cidade"]) && !empty($_POST["estado"])){
                        
			$especie = $_POST["especie"];
            $raca = $_POST["raca"];
            $cor = $_POST["cor"];
			$descpet = $_POST["desc"];
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
			$dataencontro = date('Y-m-d');
			$cidade = $_POST["cidade"];
			$estado = $_POST["estado"];	
            $idusuario = $_SESSION["idusuario"];

			cadastrarpetencontradoBO($especie, $raca, $cor, $descpet, $token, $dataencontro, $cidade, $estado, $idusuario);						
		} 
		else {
			echo "<script> alert('Preencha todos os campos obrigatórios'); </script>";
			echo "<script> window.history.back() </script>";
		}
		
	}



	if($_POST["acao"] == "cadastrarpetperdido"){
		session_start();
		if(!empty($_POST["nome"]) && !empty($_POST["especie"]) && !empty($_POST["raca"]) && !empty($_POST["cor"]) && !empty($_POST["desc"]) && ($_FILES['foto']['size'] > 0) && !empty($_POST["cidade"]) && !empty($_POST["estado"])){
                        
            $nome = $_POST["nome"];
			$especie = $_POST["especie"];
            $raca = $_POST["raca"];
            $cor = $_POST["cor"];
			$descpet = $_POST["desc"];
			$token = rand(15487,1045646);
			move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
			$datasumido = date('Y-m-d');
			$cidade = $_POST["cidade"];
			$estado = $_POST["estado"];	
            $idusuario = $_SESSION["idusuario"];

			cadastrarpetperdidoBO($nome, $especie, $raca, $cor, $descpet, $token, $datasumido, $cidade, $estado, $idusuario);						
		} 
		else {
			echo "<script> alert('Preencha todos os campos obrigatórios'); </script>";
			echo "<script> window.history.back() </script>";
		}
		
	}

	if($_POST["acao"] == "excluiradocao") {
		
		excluiradocaoPorIDBO($_GET['idpetadocao']);
	
		echo "<script> alert('Adoção excluída com sucesso'); </script>";
		echo '<meta http-equiv = refresh content= "0; url = ../paginas/Usuariomeadota.php">';
		
	}


	if($_POST["acao"] == "excluirencontrado") {
		
		excluirencontradoPorIDBO($_GET['idpetencontrado']);
	
		echo "<script> alert('Pet Encontrado excluído com sucesso'); </script>";
		echo '<meta http-equiv = refresh content= "0; url = ../paginas/Usuarioencontrados.php">';
		
	}


	if($_POST["acao"] == "excluirperdido") {
		
		excluirperdidoPorIDBO($_GET['idpetperdido']);
	
		echo "<script> alert('Pet Perdido excluído com sucesso'); </script>";
		echo '<meta http-equiv = refresh content= "0; url = ../paginas/perfil.php">';
		
	}

	if($_POST["acao"] == "buscaradocao") {
		
		editaradocaoPorIDBO($_GET['idpetadocao']);

	}

	if($_POST["acao"] == "buscarperdido") {
		
		editarperdidoPorIDBO($_GET['idpetperdido']);

	}

	if($_POST["acao"] == "buscarencontrado") {
		
		editarencontradoPorIDBO($_GET['idpetencontrado']);

	}



	if($_POST["acao"] == "editarpetadocao") {
		session_start();

		if(!empty($_POST["nome"]) && !empty($_POST["desc"]) && !empty($_POST["raca"]) && !empty($_POST["especie"])){
			
			
			$status = $_POST["status"];

			if($status == "adopt"){
				$datastatus = date('Y-m-d');
			}else{
				$datastatus = null;
			}

				if(($_FILES['foto']['size'] > 0)){

					$idpetadocao = $_POST["idpetadocao"];
					$nome = $_POST["nome"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
					$descpet = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$token = rand(15487,1045646);					
									
					move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
			

					editarpetadocaoBO($idpetadocao, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus);
					
					echo "<script> window.alert(\"Pet editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/Usuariomeadota.php">';			
				
				}else{
					$idpetadocao = $_POST["idpetadocao"];
					$nome = $_POST["nome"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
					$descpet = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$token = $_POST["token"];

					editarpetadocaoBO($idpetadocao, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus);
					
					echo "<script> window.alert(\"Pet editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/Usuariomeadota.php">';
				}	
	
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}



	if($_POST["acao"] == "editarpetperdido") {
		session_start();

		if(!empty($_POST["nome"]) && !empty($_POST["desc"]) && !empty($_POST["raca"]) && !empty($_POST["especie"])){
			
			
			$status = $_POST["status"];

			if($status == "adopt"){
				$datastatus = date('Y-m-d');
			}else{
				$datastatus = null;
			}

				if(($_FILES['foto']['size'] > 0)){

					$idpetperdido = $_POST["idpetperdido"];
					$nome = $_POST["nome"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
            		$cor = $_POST["cor"];
					$descpet = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$token = rand(15487,1045646);					
									
					move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
			

					editarpetperdidoBO($idpetperdido, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor);
					
					echo "<script> window.alert(\"Pet Perdido editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/perfil.php">';			
				
				}else{
					$idpetperdido = $_POST["idpetperdido"];
					$nome = $_POST["nome"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
            		$cor = $_POST["cor"];
					$descpet = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$token = $_POST["token"];

					editarpetperdidoBO($idpetperdido, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor);
					
					echo "<script> window.alert(\"Pet Perdido editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/perfil.php">';
				}	
	
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}

	if($_POST["acao"] == "editarpetencontrado") {
		session_start();

		if(!empty($_POST["desc"]) && !empty($_POST["raca"]) && !empty($_POST["especie"])){
			
			
			$status = $_POST["status"];

			if($status == "adopt"){
				$datastatus = date('Y-m-d');
			}else{
				$datastatus = null;
			}

				if(($_FILES['foto']['size'] > 0)){

					$idpetencontrado = $_POST["idpetencontrado"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
            		$cor = $_POST["cor"];
					$descpet = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$token = rand(15487,1045646);					
									
					move_uploaded_file($_FILES["foto"]['tmp_name'], '../img/'.$token.'.png');
			

					editarpetencontradoBO($idpetencontrado, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor);
					
					echo "<script> window.alert(\"Pet encontrado editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/Usuarioencontrados.php">';			
				
				}else{
					$idpetencontrado = $_POST["idpetencontrado"];
					$especie = $_POST["especie"];
            		$raca = $_POST["raca"];
            		$cor = $_POST["cor"];
					$descpet = $_POST["desc"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
					$token = $_POST["token"];

					editarpetencontradoBO($idpetencontrado, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor);
					
					echo "<script> window.alert(\"Pet encontrado editado com sucesso\") </script>";
					echo '<meta http-equiv = refresh content= "0; url = ../Paginas/Usuarioencontrados.php">';
				}	
	
		} else {
			echo "<script> window.alert(\"Você deve preencher todos os campos\") </script>";
			echo "<script> window.history.back(); </script>";
		}
		
	}





?>