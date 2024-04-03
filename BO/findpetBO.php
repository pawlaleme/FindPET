<?php

include_once '../DAO/findpetDAO.php';


function cadastrarusuarioBO($nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $foto, $contato){
    return cadastrarusuarioDAO($nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $foto, $contato);
    
}

function logarBO($email, $senha){
    return logarDAO($email, $senha);

}

function cadastrarpetBO($nome, $especie, $raca, $descpet, $foto, $idusuario){
    return cadastrarpetDAO($nome, $especie, $raca, $descpet, $foto, $idusuario);
    
}

function cadastrarpetadocaoBO($nome, $especie, $raca, $descpet, $foto, $dataadoc, $cidade, $estado, $idusuario){
    return cadastrarpetadocaoDAO($nome, $especie, $raca, $descpet, $foto, $dataadoc, $cidade, $estado, $idusuario);
    
}

function cadastrarpetencontradoBO($especie, $raca, $cor, $descpet, $foto, $dataencontro, $cidade, $estado, $idusuario){
    return cadastrarpetencontradoDAO($especie, $raca, $cor, $descpet, $foto, $dataencontro, $cidade, $estado, $idusuario);
    
}

function cadastrarpetperdidoBO($nome, $especie, $raca, $cor, $descpet, $foto, $datasumido, $cidade, $estado, $idusuario){
    return cadastrarpetperdidoDAO($nome, $especie, $raca, $cor, $descpet, $foto, $datasumido, $cidade, $estado, $idusuario);
    
}

function editarusuarioBO($idusuario, $nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $token, $contato){
    return editarusuarioDAO($idusuario, $nome, $datanasc, $email, $senha, $senha2, $desc, $cidade, $estado, $token, $contato);
    
}

function editarpetBO($idpet, $nome, $especie, $raca, $descpet, $token){
    return editarpetDAO($idpet, $nome, $especie, $raca, $descpet, $token);
    
}

function excluirpetPorIDBO($idpet){
    return excluirpetPorIDDAO($idpet);
}

function excluiradocaoPorIDBO($idpetadocao){
    return excluiradocaoPorIDDAO($idpetadocao);
}

function excluirencontradoPorIDBO($idpetencontrado){
    return excluirencontradoPorIDDAO($idpetencontrado);
}

function excluirperdidoPorIDBO($idpetperdido){
    return excluirperdidoPorIDDAO($idpetperdido);
}



function buscarperfilativoBO($idusuario) {
    return buscarperfilativoDAO($idusuario);
}

function buscarAdocaoUsuarioAtivoBO($idusuario) {
    return buscarAdocaoUsuarioAtivoDAO($idusuario);
}

function buscarEncontradoUsuarioAtivoBO($idusuario) {
    return buscarEncontradoUsuarioAtivoDAO($idusuario);
}

function buscarPerdidoUsuarioAtivoBO($idusuario) {
    return buscarPerdidoUsuarioAtivoDAO($idusuario);
}

function buscarAdocaoGeralBO() {
    return buscarAdocaoGeralDAO();
}

function buscarEncontradoGeralBO() {
    return buscarEncontradoGeralDAO();
}

function buscarPerdidoGeralBO() {
    return buscarPerdidoGeralDAO();
}

function editaradocaoPorIDBO($idpetadocao) {
    return editaradocaoPorIDDAO($idpetadocao);
}

function editarperdidoPorIDBO($idpetperdido) {
    return editarperdidoPorIDDAO($idpetperdido);
}

function editarpetadocaoBO($idpetadocao, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $dataadoc){
    return editarpetadocaoDAO($idpetadocao, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $dataadoc);
}


function editarpetperdidoBO($idpetperdido, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor){
    return editarpetperdidoDAO($idpetperdido, $nome, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor);
}

function editarpetencontradoBO($idpetencontrado, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor){
    return editarpetencontradoDAO($idpetencontrado, $especie, $raca, $descpet, $token, $cidade, $estado, $datastatus, $cor);

}

?>