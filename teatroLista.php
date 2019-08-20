<?php
    $host = "localhost";
    $usuario = "joao";
    $senha = "vitor123";
    $banco = "evento";

    /* abre conexão */
    $conex = mysqli_connect($host,$usuario,$senha);
    if(!$conex){
        /*não conseguiu abrir conexão, mostra error, emorre o programa*/
        echo mysqli_error($conex);
        die();
    }
    /*seleciona o banco de dados*/
    
    if(!mysqli_select_db($conex,$banco)){
        /*erro ao selecionar o BD*/
        echo "erro no select_db";
        echo mysqli_error($conex);
        mysqli_close($conex);
        die();
    }

    $sql = "select * from teatro";
    /* testar cosulta na conexao $conex*/
    $resp = mysqli_query($conex, $sql);
    if(!$resp){
        echo "erro na consulta $sql";
        echo mysqli_error($conex);
        mysqli_close($conex);
        die();
    }

    $linha = mysqli_fetch_assoc($resp);/*pega linha a linha presente na consulta $sql*/
    /*se $linha existir=verdadeiro, entra no if*/
    if($linha){
        while($linha){
            /*enquanto $linha for verdadeiro while é executado*/
            echo "<div style=\"padding:10px;margin:5px;border:1px black solid;\">";
            echo "Id evento: <b>{$linha["id_evento"]}</b><br>";
            echo "Nome da Peça: <b>{$linha["nome_peca"]}</b><br>";
            echo "Endereço: <b>{$linha["endereco"]}</b><br>";
            echo "Cidade: <b>{$linha["cidade"]}</b><br>";  
            echo "Genero: <b>{$linha["genero"]}</b><br>"; 
            echo "Classificação: <b>{$linha["classific_idade"]}</b><br>";
            echo "Data: <b>{$linha["dia"]}</b><br>";
            echo "Diretor <b>{$linha["diretor"]}</b><br>";
            echo "<a href=\"atualizaPeca.php?id_evento={$linha["id_evento"]}\">Atualizar</a>";
            echo "---";
            echo "<a href=\"apagaPeca.php?id_evento={$linha["id_evento"]}\">Apagar</a>";                   
            echo "</div>";
            $linha = mysqli_fetch_assoc($resp);
        }
    }
    else{
        echo "Tabela Vazia";
    }
    echo "<a href=\"incluiPeca.php\">Incluir</a>";
    
    mysqli_free_result($resp); //Ajuda a limpar resposta de consulta
    mysqli_close($conex); //fechar conexão


?>