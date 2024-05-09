INSERT INTO gym_workouts (name, level) VALUES 
('Treino de Pernas', 'avançado'),
('Treino de Peito e Tríceps', 'intermediário'),
('Treino de Costas e Bíceps', 'iniciante');

INSERT INTO gym_exercises (name, description, repetitions, weight) VALUES
('Agachamento Livre', 'Agachamento com barra nas costas', 10, 15),
('Supino Reto', 'Supino com barra em bancada plana', 12, 15),
('Puxada na Polia Alta', 'Puxada para costas alta com polia', 8, 15);

SELECT * FROM gym_workouts;
SELECT * FROM gym_exercises;

DROP TABLE gym_workouts;

SET SQL_SAFE_UPDATES=0;
delete from gym_workouts;

-- os dados são retornados por meio de uma consulta que trás os exercícios de um treino  que tenham o id
-- especificado na tabela de relacionamento
-- consulta que retorna os dados de um treino por meio de tabela de relacionamento
SELECT 
    gym_exercises.id AS exercise_id,
    gym_exercises.name AS exercise_name,
    gym_exercises.description AS exercise_description,
    gym_exercises.repetitions AS exercise_repetitions
FROM 
    gym_exercises
JOIN 
    workout_exercises ON gym_exercises.id = workout_exercises.exercise_id
WHERE 
    workout_exercises.workout_id = 1; -- Substitua 1 pelo ID do treino desejado
