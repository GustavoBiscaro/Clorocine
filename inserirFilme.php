<?php
$bd = new SQLite3("filmes.db");

$titulo = $bd->escapeString($_POST["titulo"]);
$sinopse = $bd->escapeString($_POST["sinopse"]);
$nota = $bd->escapeString($_POST["nota"]);
$poster = $bd->escapeString($_POST["poster"]);

if ($stmt->execute())
echo "\nfilmes inseridos com sucesso\n"; 
else 
echo "\nerro ao inserir filmes. ". $bd->lastErrorMsg();

header("Location: galeria.php?msg=Filme+cadastrado+com+sucesso");
?>