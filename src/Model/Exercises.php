<?php

class Exercise
{
    private ?int $id;
    private string $name;
    private int $repetitions;
    private float $weight;
    private string $description;


    public function __construct(?int $id, string $name,  int $repetitions, float $weight, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->repetitions = $repetitions;
        $this->weight = $weight;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getRepetitions(){
        return $this->repetitions;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function getDescription(){
        return $this->description;
    }
}