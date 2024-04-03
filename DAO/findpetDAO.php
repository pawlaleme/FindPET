<?php

include_once '../Util/conexaoBD.php';

//INICIO CADASTRO USUARIO
function cadastrarusuarioDAO($nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $foto, $contato) {
	
    $bancoDeDados = conectar();
    
        try {
                 $verifica = $bancoDeDados->prepare("select * from usuario where email = ?");
                 $verifica->bindValue(1, $email);
                 $verifica->execute();

            if($verifica->rowCount() == 0){
            if ($senha != $senha2) {
                echo "<script> alert('As senhas não coincidem'); </script>";
                echo "<script> window.history.back() </script>";
            }else{

                $cadastrar = $bancoDeDados->prepare("insert into usuario(nome, datanasc, email, senha, descricao_usuario, cidade_usuario, estado, foto, contato) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $cadastrar->bindParam(1, $nome);
                $cadastrar->bindParam(2, $datanasc);
                $cadastrar->bindParam(3, $email);
                $cadastrar->bindParam(4, $senha);
                $cadastrar->bindParam(5, $desc);
                $cadastrar->bindParam(6, $cidade);
                $cadastrar->bindParam(7, $estado);
                $cadastrar->bindParam(8, $foto);
                $cadastrar->bindParam(9, $contato);
                $cadastrar->execute();
                
                echo "<script> alert('Usuário cadastrado com sucesso'); </script>";
                echo '<meta http-equiv = refresh content= "0; url = ../index.html">';
            }
        }else{
            echo "<script> alert('E-mail já cadastrado'); </script>";
            echo "<script> window.history.back() </script>";

             }
        }catch (Exception $e) {
            echo "Erro findPetDAO: " . $e;
        }
}



//FIM CADASTRO USUÁRIO

//INICIO LOGAR
function logarDAO($email, $senha){
		
    $bancoDeDados = conectar();
    try{

        $verificaemail = $bancoDeDados->prepare("select * from usuario where email = ? and senha = ?");
        $verificaemail->bindValue(1, $email);
        $verificaemail->bindValue(2, $senha);
        $verificaemail->execute();

        if ($verificaemail->rowCount() == 1) {            
            $list = $bancoDeDados->query("select * from usuario where email = '$email' and senha = '$senha'");
            $list->execute();
            while ($registro = $list->fetch(PDO::FETCH_OBJ)) {
                $_SESSION["idusuario"] = $registro->idusuario;
                $_SESSION["email"] = $registro->email;
                $_SESSION["senha"] = $registro->senha;
            }
        echo "<script> alert('Login efetuado com sucesso.'); </script>";
        echo '<meta http-equiv = refresh content= "0; url = ../paginas/perfil.php">';
        }
        else{				
            echo "<script> alert('Credenciais Inválidas'); </script>";
            echo "<script> window.history.back() </script>";
        }
    }
    catch(Exception $e){
        echo "Erro findPetDAO: " . $e;

    }
}

//FIM LOGAR

//INICIO CADASTRAR PET
function cadastrarpetDAO($nome, $especie, $raca, $descpet, $foto, $idusuario) {
	
    $bancoDeDados = conectar();
    
    try {
        $cadastrar = $bancoDeDados->prepare("insert into pet(nome, especie, raca, descricao, foto, idusuario) values (?, ?, ?, ?, ?, ?)");
        $cadastrar->bindParam(1, $nome);
        $cadastrar->bindParam(2, $especie);
        $cadastrar->bindParam(3, $raca);
        $cadastrar->bindParam(4, $descpet);
        $cadastrar->bindParam(5, $foto);
        $cadastrar->bindParam(6, $idusuario);
        $cadastrar->execute();
        

        echo "<script> alert('Pet cadastrado com sucesso!'); </script>";
        echo '<meta http-equiv = refresh content= "0; url = ../paginas/perfil.php">';
        
    } catch (Exception $e) {
        echo "Erro findPetDAO: " . $e;
    }
    
}

//FIM CADASTRAR PET


//INICIO CADASTRAR ADOÇÃO DE PET
function cadastrarpetadocaoDAO($nome, $especie, $raca, $descpet, $foto, $dataadoc, $cidade, $estado, $idusuario) {
	
    $bancoDeDados = conectar();
    
    try {
        $cadastrar = $bancoDeDados->prepare("insert into petadocao(nome, especie, raca, descricao, foto, dataadocao, cidade, estado, idusuario) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $cadastrar->bindParam(1, $nome);
        $cadastrar->bindParam(2, $especie);
        $cadastrar->bindParam(3, $raca);
        $cadastrar->bindParam(4, $descpet);
        $cadastrar->bindParam(5, $foto);
        $cadastrar->bindParam(6, $dataadoc);
        $cadastrar->bindParam(7, $cidade);
        $cadastrar->bindParam(8, $estado);
        $cadastrar->bindParam(9, $idusuario);
        $cadastrar->execute();
        

        echo "<script> alert('Adoção cadastrada com sucesso!'); </script>";
        echo '<meta http-equiv = refresh content= "0; url = ../paginas/Usuariomeadota.php">';
        
    } catch (Exception $e) {
        echo "Erro findPetDAO: " . $e;
    }
    
}

//FIM CADASTRAR ADOÇÃO DE PET

//INICIO CADASTRAR PET ENCONTRADO
function cadastrarpetencontradoDAO($especie, $raca, $cor, $descpet, $foto, $dataencontro, $cidade, $estado, $idusuario) {
	
    $bancoDeDados = conectar();
    
    try {
        $cadastrar = $bancoDeDados->prepare("insert into petencontrado(especie, raca, cor, descricao, foto, dataencontro, cidade, estado, idusuario) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $cadastrar->bindParam(1, $especie);
        $cadastrar->bindParam(2, $raca);
        $cadastrar->bindParam(3, $cor);
        $cadastrar->bindParam(4, $descpet);
        $cadastrar->bindParam(5, $foto);
        $cadastrar->bindParam(6, $dataencontro);
        $cadastrar->bindParam(7, $cidade);
        $cadastrar->bindParam(8, $estado);
        $cadastrar->bindParam(9, $idusuario);
        $cadastrar->execute();
        

        echo "<script> alert('Pet encontrado cadastrado com sucesso!'); </script>";
        echo '<meta http-equiv = refresh content= "0; url = ../paginas/Usuarioencontrados.php">';
        
    } catch (Exception $e) {
        echo "Erro findPetDAO: " . $e;
    }
    
}

//FIM CADASTRAR PET ENCONTRADO


//INICIO CADASTRAR PET PERDIDO
function cadastrarpetperdidoDAO($nome, $especie, $raca, $cor, $descpet, $foto, $datasumido, $cidade, $estado, $idusuario) {
	
    $bancoDeDados = conectar();
    
    try {
        $cadastrar = $bancoDeDados->prepare("insert into petperdido(nome, especie, raca, cor, descricao, foto, datasumido, cidade, estado, idusuario) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $cadastrar->bindParam(1, $nome);
        $cadastrar->bindParam(2, $especie);
        $cadastrar->bindParam(3, $raca);
        $cadastrar->bindParam(4, $cor);
        $cadastrar->bindParam(5, $descpet);
        $cadastrar->bindParam(6, $foto);
        $cadastrar->bindParam(7, $datasumido);
        $cadastrar->bindParam(8, $cidade);
        $cadastrar->bindParam(9, $estado);
        $cadastrar->bindParam(10, $idusuario);
        $cadastrar->execute();
        

        echo "<script> alert('Pet perdido cadastrado com sucesso!'); </script>";
        echo '<meta http-equiv = refresh content= "0; url = ../paginas/perfil.php">';
        
    } catch (Exception $e) {
        echo "Erro findPetDAO: " . $e;
    }
    
}

//FIM CADASTRAR PET PERDIDO



function editarusuarioDAO($idusuario, $nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $token, $contato){
    $bancoDeDados = conectar();
    
    try {
        
        $verifica = $bancoDeDados->prepare("select * from usuario where email = ?");
        $verifica->bindValue(1, $email);
        $verifica->execute();

        
    if($verifica->rowCount() == 0){

            $sql = "update usuario set email = '".$email."', nome = '".$nome."', datanasc = '".$datanasc."', descricao_usuario = '".$desc."', cidade_usuario = '".$cidade."', estado = '".$estado."', foto = '".$token."', contato = '".$contato."' where idusuario = ".$idusuario;
            echo "<script> alert('Usuário editado com sucesso'); </script>";
            return $bancoDeDados->exec($sql);

        }else{
            
            $buscaemail = "select email from usuario where idusuario !=".$idusuario." and email = '".$email."'";
            $linhas = $bancoDeDados->query($buscaemail);

            if($linhas->rowCount() == 0){
                $sql = "update usuario set email = '".$email."', nome = '".$nome."', datanasc = '".$datanasc."', descricao_usuario = '".$desc."', cidade_usuario = '".$cidade."', estado = '".$estado."', foto = '".$token."', contato = '".$contato."' where idusuario = ".$idusuario;
                echo "<script> alert('Usuário editado com sucesso'); </script>";
                return $bancoDeDados->exec($sql);
            
            } else {   

                echo "<script> alert('E-mail já está cadastrado no sistema'); </script>";

            }
        }
    
    
    } catch (Exception $e) {
        echo "Erro editarUsuarioDAO: " . $e->getMessage();
    }
}


function editarpetDAO($idpet, $nome, $especie, $raca, $descpet, $token){

    $bancoDeDados = conectar();
    
    try {
        
        $sql = "update pet set especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', nome = '".$nomepet."', foto = '".$token."' where idpet = ".$idpet;
    
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro editarAdocaoDAO: " . $e->getMessage();
    }


}


function excluirpetPorIDDAO($idpet) {
    $bancoDeDados = conectar();
    
    try {

        $sql = "delete from pet where idpet = ".$idpet;
    
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
    }
}


function excluiradocaoPorIDDAO($idpetadocao) {
    $bancoDeDados = conectar();
    
    try {

        $sql = "delete from petadocao where idpetadocao = ".$idpetadocao;
    
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
    }
}


function excluirencontradoPorIDDAO($idpetencontrado) {
    $bancoDeDados = conectar();
    
    try {

        $sql = "delete from petencontrado where idpetencontrado = ".$idpetencontrado;
    
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
    }
}


function excluirperdidoPorIDDAO($idpetperdido) {
    $bancoDeDados = conectar();
    
    try {

        $sql = "delete from petperdido where idpetperdido = ".$idpetperdido;
    
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro excluirRegistrosPorIDDAO: " . $e->getMessage();
    }
}


function buscarperfilativoDAO($idusuario) {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select u.nome, u.datanasc, u.email, u.descricao_usuario, u.cidade_usuario, u.estado, u.foto, u.contato from usuario u where u.idusuario = '".$idusuario."'";
        
        //QUERY utiliza-se apenas para consulta
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarperfilDAO: " . $e->getMessage();
    }
}


//USUARIO ATIVO

function buscarAdocaoUsuarioAtivoDAO($idusuario) {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select a.idpetadocao, a.nome, a.especie, a.raca, a.descricao, a.foto, a.dataadocao, a.data_adotado, a.cidade, a.estado, a.idusuario from petadocao a where a.idusuario = ".$idusuario;
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }
}


function buscarEncontradoUsuarioAtivoDAO($idusuario) {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select e.idpetencontrado, e.especie, e.raca, e.descricao, e.foto, e.dataencontro, e.dataencontro_dono, e.cidade, e.estado, e.idusuario, e.cor from petencontrado e where e.idusuario = ".$idusuario;
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }
}


function buscarPerdidoUsuarioAtivoDAO($idusuario) {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select p.idpetperdido, p.nome, p.especie, p.raca, p.descricao, p.foto, p.datasumido, p.dataencontro, p.cidade, p.estado, p.idusuario from petperdido p where p.idusuario = ".$idusuario;
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }
}


//GERAL

function buscarAdocaoGeralDAO() {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select a.idpetadocao, a.nome, a.especie, a.raca, a.descricao, a.foto, a.dataadocao, a.data_adotado, a.cidade, a.estado, a.idusuario from petadocao a";
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }
}


function buscarEncontradoGeralDAO() {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select e.idpetencontrado, e.especie, e.raca, e.descricao, e.foto, e.dataencontro, e.dataencontro_dono, e.cidade, e.estado, e.idusuario, e.cor from petencontrado e";
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }
}


function buscarPerdidoGeralDAO() {
		
    $bancoDeDados = conectar();
    
    try {
        $consulta = "select p.idpetperdido, p.nome, p.especie, p.raca, p.descricao, p.foto, p.datasumido, p.dataencontro, p.cidade, p.estado, p.idusuario from petperdido p";
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }
}


function editaradocaoPorIDDAO($idpetadocao){

    $bancoDeDados = conectar();
    
    try {
        $consulta = "select a.nome, a.especie, a.raca, a.descricao, a.foto, a.dataadocao, a.data_adotado, a.cidade, a.estado, a.idusuario from petadocao a where a.idpetadocao = ".$idpetadocao;
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }


    
}


function editarperdidoPorIDDAO($idpetperdido){

    $bancoDeDados = conectar();
    
    try {
        $consulta = "select a.dataencontro, a.nome, a.especie, a.raca, a.descricao, a.foto, a.datasumido, a.cidade, a.estado, a.idusuario, a.cor from petperdido a where a.idpetperdido = ".$idpetperdido;
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }


    
}


function editarencontradoPorIDDAO($idpetencontrado){

    $bancoDeDados = conectar();
    
    try {
        $consulta = "select a.dataencontro_dono, a.especie, a.raca, a.descricao, a.foto, a.dataencontro, a.cidade, a.estado, a.idusuario, a.cor from petencontrado a where a.idpetencontrado = ".$idpetencontrado;
        
        return $bancoDeDados->query($consulta);
        
    } catch (Exception $e) {
        echo "Erro consultarTodosRegistrosDAO: " . $e->getMessage();
    }


    
}



function editarpetadocaoDAO($idpetadocao, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $dataadoc){

    $bancoDeDados = conectar();
    
    try {

        if($dataadoc == null){

            $sql = "update petadocao set nome = '".$nome."', especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', foto = '".$token."', cidade = '".$cidade."', estado = '".$estado."', data_adotado = null where idpetadocao = ".$idpetadocao;
    
        }
        else{

            $sql = "update petadocao set nome = '".$nome."', especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', foto = '".$token."', cidade = '".$cidade."', estado = '".$estado."', data_adotado = '".$dataadoc."' where idpetadocao = ".$idpetadocao;
    
        }
        
       
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro editarAdocaoDAO: " . $e->getMessage();
    }


}


function editarpetperdidoDAO($idpetperdido, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor){

    $bancoDeDados = conectar();
    
    try {

        if($datastatus == null){

            $sql = "update petperdido set nome = '".$nome."', especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', foto = '".$token."', cidade = '".$cidade."', estado = '".$estado."', dataencontro = null, cor = '".$cor."' where idpetperdido = ".$idpetperdido;
    
        }
        else{

            $sql = "update petperdido set nome = '".$nome."', especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', foto = '".$token."', cidade = '".$cidade."', estado = '".$estado."', dataencontro = '".$datastatus."', cor = '".$cor."' where idpetperdido = ".$idpetperdido;
    
        }
        
       
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro editarAdocaoDAO: " . $e->getMessage();
    }


}



function editarpetencontradoDAO($idpetencontrado, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor){

    $bancoDeDados = conectar();
    
    try {

        if($datastatus == null){

            $sql = "update petencontrado set especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', foto = '".$token."', cidade = '".$cidade."', estado = '".$estado."', dataencontro_dono = null, cor = '".$cor."' where idpetencontrado = ".$idpetencontrado;
    
        }
        else{

            $sql = "update petencontrado set especie = '".$especie."', raca = '".$raca."', descricao = '".$descpet."', foto = '".$token."', cidade = '".$cidade."', estado = '".$estado."', dataencontro_dono = '".$datastatus."', cor = '".$cor."' where idpetencontrado = ".$idpetencontrado;
    
        }
        
       
        return $bancoDeDados->exec($sql);
    
    } catch (Exception $e) {
        echo "Erro editarAdocaoDAO: " . $e->getMessage();
    }


}



?>