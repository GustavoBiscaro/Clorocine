<?php

require "Conexao.php";

class FilmesRepositoryPDO {

    private $conexao;
    public function construct()
    {
        $this->conexao = Conexao::criar();
    }
    public  function listarTodos():array{
        $bd = Conexao::criar();
        $filmesLista = array();

        $sql = "SELECT * FROM filmes";
        $filmes = $this->conexao->query($sql);
        while ($filme = $filmes->fetchObject()){
            array_push($filmesLista, $filme);
        }
        return $filmesLista;
    }

    public function salvar(Filme $filme):bool {
        $sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) 
        VALUES (:titulo, :poster, :sinopse, :nota)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $filme->titulo, SQLITE3_TEXT);
        $stmt->bindValue(':sinopse', $filme->sinopse, SQLITE3_TEXT);
        $stmt->bindValue(':nota', $filme->nota, SQLITE3_FLOAT);
        $stmt->bindValue(':poster', $filme->poster, SQLITE3_TEXT);

        return $stmt->execute();
    }
}
?>