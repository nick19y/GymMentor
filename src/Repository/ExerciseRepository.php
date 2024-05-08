<?php

class ExerciseRepository
{
    private PDO $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function makeObject($data)
    {
        return new Exercise($data['id'], $data['name'], $data['repetitions'], $data['weight']);
    }
    public function createExercise(Exercise $exercise)
    {
        $sql = "INSERT INTO gym_exercises (name, repetitions, weight) VALUES(?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $exercise->getName());
        $statement->bindValue(2, $exercise->getRepetitions());
        $statement->bindValue(3, $exercise->getWeight());
        $statement->execute();
    }
    public function readExercises(){
        $sql = "SELECT * FROM gym_exercises ge 
        INNER JOIN workout_exercises we ON ge.id = we.workout_id
        INNER JOIN gym_workouts gw ON gw.id = we.exercise_id
        ";
    }
}