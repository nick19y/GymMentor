<?php

class Training
{
    private int $id;
    private string $name;
    private string $level;
    private string $img;

    public function __construct(int $id, string $name, string $level,  string $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
        $this->img = $img;
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
    public function getImg(){
        return $this->img;
    }
}