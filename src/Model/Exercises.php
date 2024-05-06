<?php

class Exercises
{
    private int $id;
    private string $name;
    private string $description;
    private int $repetitions;


    public function __construct(int $id, string $name, string $description,  string $repetitions)
    {
        $this->id = $id;
        $this->name = $name;
        $this->$description = $description;
        $this->repetitions = $repetitions;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getRepetitions(){
        return $this->repetitions;
    }
}