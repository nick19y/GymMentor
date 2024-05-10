use GymMentor;
CREATE TABLE gym_workouts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    level VARCHAR(255) NOT NULL
);

CREATE TABLE gym_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    repetitions INT,
    weight FLOAT
);

CREATE TABLE workout_exercises (
    workout_id INT,
    exercise_id INT,
    FOREIGN KEY (workout_id) REFERENCES gym_workouts(id),
    FOREIGN KEY (exercise_id) REFERENCES gym_exercises(id)
);
select* from gym_exercises;
select* from gym_workouts;
select* from workout_exercises;
delete from workout_exercises;
SELECT id FROM gym_workouts ORDER BY id DESC LIMIT 1;

SET SQL_SAFE_UPDATES = 0;

-- consulta que retorna os exercícios a partir do id do treino
SELECT * FROM gym_exercises
INNER JOIN workout_exercises ON gym_exercises.id = workout_exercises.exercise_id
INNER JOIN gym_workouts ON workout_exercises.workout_id = gym_workouts.id
WHERE gym_workouts.id = 1;
