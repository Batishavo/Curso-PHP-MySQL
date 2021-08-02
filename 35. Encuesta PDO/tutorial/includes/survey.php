<?php
include_once 'db.php';

class Survey extends DB{
    //VAriables golbales de los votos
    private $totalVotes;
    private $optionSelected;
    //funciones para sumar los votos
    public function setOptionSelected($option){
        $this->optionSelected = $option;
    }
    //Fucion para devolver el valor
    public function getOptionSelected(){
        return $this->optionSelected;
    }

    public function vote(){
        $query = $this->connect()->prepare('UPDATE lenguajes SET votos = votos + 1 WHERE opcion = :opcion');
        $query->execute(['opcion' => $this->optionSelected]);
    }

    public function showResults(){
        return $this->connect()->query('SELECT * FROM lenguajes');
    }

    public function getTotalVotes(){
        $query =$this->connect()->query('SELECT SUM(votos) AS votos_totales FROM lenguajes');
        $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
        return $this->totalVotes;
    }
    //el total redondeado
    public function getPercentageVotes($votes){
        return round(($votes / $this->totalVotes) * 100, 0);
    }
}
?>
