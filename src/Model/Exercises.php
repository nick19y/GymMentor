<?php

class Exercise
{
    private ?int $id;
    private string $name;
    private int $repetitions;
    private float $weight;


    public function __construct(?int $id, string $name,  int $repetitions, float $weight)
    {
        $this->id = $id;
        $this->name = $name;
        $this->repetitions = $repetitions;
        $this->weight = $weight;
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
}