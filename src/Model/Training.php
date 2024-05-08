<?php

class Training
{
    private ?int $id;
    private string $name;
    private string $level;

    public function __construct(?int $id, string $name, string $level)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getLevel(){
        return $this->level;
    }
}