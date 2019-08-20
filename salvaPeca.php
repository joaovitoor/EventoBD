<?php

$id_evento = $_REQUEST["id_evento"];
$nome_peca = $_REQUEST["nome_peca"];
$endereco = $_REQUEST["endereco"];
$cidade = $_REQUEST["cidade"];
$genero = $_REQUEST["genero"];
$classific_idade = $_REQUEST["classific_idade"];
$dia = $_REQUEST["dia"];
$diretor= $_REQUEST["diretor"];

if(empty($id_evento)){ // Se $id_evento estiver vazio/empty siguinifica que nao existe nenhum dado naquela tupla, entao deve inserir dados na tabela teatro
    // incluir na tabela teatro
    $sql = "insert into teatro(nome_peca, endereco, cidade, genero, classific_idade, dia, diretor) 
    values('$nome_peca', '$endereco', '$cidade', '$genero',
    '$classific_idade', '$dia', '$diretor')";
    
}
else{
    // Se id evento nao/else estiver vazio então ja existe uma tupla com dados, se quiser modificar é necessário atualizar/update
    $sql = "update teatro set nome_peca = '$nome_peca', 
    endereco = '$endereco', cidade = '$cidade', 
    genero = '$genero', classific_idade = '$classific_idade', 
    dia = '$dia', diretor = '$diretor' where id_evento = $id_evento";
}

$host = "localhost";
$usuario = "joao";
$senha = "vitor123";
$banco = "evento";

$conex = mysqli_connect($host, $usuario, $senha);

if(!$conex){
    echo "erro na conexão";
    echo mysqli_error($conex);
    die();
}
if(!mysqli_select_db($conex, $banco)){
    echo "erro no select_db";
    echo mysqli_error($conex);
    echo mysqli_close($conex);
    die();
}

$resp = mysqli_query($conex, $sql);

if(!$resp){
    echo "erro na consulta $sql";
    echo mysqli_error($conex);
    mysqli_close($conex);
    die();
}
// se consulta foi executada com sucesso, volta para a pagina de listagem com o novo cadastro
else{
    header("location: teatroLista.php");
}
