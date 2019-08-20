<?php

$form = <<<EOT

<form method="post" action="salvaPeca.php">
    <input type = "hidden" name = "id_evento" value = "$id_evento">
    <p>Peça: <input type = "text" name = "nome_peca" size = "40" value = "$nome_peca"></p>
    <p>Endereço: <input type = "text" name = "endereco" size = "40" value ="$endereco"></p>
    <p>Cidade: <input type = "text" name = "cidade" size = "40" value = "$cidade"></p>
    <p>Gênero: <input type = "text" name = "genero" size = "40" value= "$genero"></p>
    <p>Classificação indicativa: <input type = "number" name = "classific_idade" size = "40" value "$classific_idade"></p>
    <p>Data: <input type = "date" name = "dia" size = "40" value = "$dia"></p>
    <p>Diretor: <input type = "text" name = "diretor" size = "40" value = "$diretor"></p>
    <p><input type = "submit" value = "salva"></p>
</form>
EOT;

echo $form;