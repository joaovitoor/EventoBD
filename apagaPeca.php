<?php
$id_evento = $_REQUEST["id_evento"];

// Se id do evento não estiver vazio, conecta no banco e executa o comando SQL "delete"
if(!empty("$id_evento")){
    $sql = "delete from teatro where id_evento = $id_evento";

    $host = "localhost";
    $usuario = "joao";
    $senha = "vitor123";
    $banco = "evento";

    $conex = mysqli_connect($host, $usuario, $senha);

    if(!$conex){
        echo "erro na conexao";
        echo mysqli_error($conex);
        die();
    }
    if(!mysqli_select_db($conex, $banco)){
        echo "erro no select_db";
        echo mysqli_error($conex);
        mysqli_close($conex);
        die();
    }
    
    $resp = mysqli_query($conex, $sql);

    if(!$resp){
        echo "erro na consulta $sql";
        echo mysqli_error($conex);
        mysqli_close($conex);
        die();
    }else{
        header("location: teatroLista.php");
    }
}
else {
    echo "<div>";
    echo "<b>Notice</b>";
    echo ": ID NAO INFORMADO<br>";
    echo "<a href=\"teatroLista.php\">Início<a>";
    echo "</div>";
}