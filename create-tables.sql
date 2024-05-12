use GymMentor;
CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
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

delete from users;

SELECT id AS last_id FROM gym_workouts ORDER BY id DESC LIMIT 1;


delete from gym_exercises;

SELECT workout_id, COUNT(exercise_id) AS total_exercises
FROM workout_exercises
WHERE workout_id = 40
GROUP BY workout_id;

SELECT workout_id, COUNT(exercise_id) AS total_exercises
FROM workout_exercises
GROUP BY workout_id;
select * from users;

SET SQL_SAFE_UPDATES = 0;

-- consulta que retorna os exercícios a partir do id do treino
SELECT * FROM gym_exercises
INNER JOIN workout_exercises ON gym_exercises.id = workout_exercises.exercise_id
INNER JOIN gym_workouts ON workout_exercises.workout_id = gym_workouts.id
WHERE gym_workouts.id = 18;
