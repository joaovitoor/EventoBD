<?php

    $id_evento = $_REQUEST["id_evento"];
    if(!$id_evento){
        echo "<div>";
        echo "<b>Notice<b>";
        echo ": ID DO EVENTO NÃO INFORMADO<br>";
        echo "<a href=\"teatroLista.php\">Início</a>";
        echo "</div>";
    }
    $host = "localhost";
    $usuario = "joao";
    $senha = "vitor123";
    $banco = "evento";

    $conex = mysqli_connect($host, $usuario, $senha);
    if(!$conex){
        echo "erro na conexão";
        echo mysqli_erro($conex);
        die();
    }
    if(!mysqli_select_db($conex, $banco)){
        echo "erro no select_db";
        echo mysqli_error($conex);
        mysqli_close($conex);
        die();
    }

    $sql = "select * from teatro where id_evento= $id_evento";

    $resp = mysqli_query($conex, $sql);
    if(!$resp){
        echo "erro na consulta $sql";
        echo mysqli_error($conex);
        mysqli_close($conex);
        die();
    }

    $linha = mysqli_fetch_assoc($resp);
    if($linha){
        $nome_peca = $linha["nome_peca"];
        $endereco = $linha["endereco"];
        $cidade = $linha["cidade"];
        $genero = $linha["genero"];
        $classific_idade = $linha["classific_idade"];
        $dia = $linha["dia"];
        $diretor = $linha["diretor"];
        
        include "formPeca.php";
    }
    else{
        //Não acho que seja necessário esse else, devido ao teste realizado em '$resp'
        echo "erro na consulta";
    }
    mysqli_free_result($resp);
    mysqli_close($conex);

