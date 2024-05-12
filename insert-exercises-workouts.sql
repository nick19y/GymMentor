INSERT INTO gym_workouts (name, level) VALUES 
('Treino de Pernas', 'avançado'),
('Treino de Peito e Tríceps', 'intermediário'),
('Treino de Costas e Bíceps', 'iniciante');

INSERT INTO gym_exercises (name, description, repetitions, weight) VALUES
('Flexão de Braço', 'Flexão de braço no chão', 15, 0),
('Rosca Direta', 'Rosca com barra reta', 12, 10),
('Leg Press', 'Pressão de pernas na máquina', 12, 50),
('Crucifixo com Halteres', 'Crucifixo com halteres no banco', 12, 8),
('Elevação Frontal', 'Elevação frontal com halteres', 12, 6),
('Agachamento com Barra', 'Agachamento com barra nas costas', 10, 20),
('Elevação Lateral', 'Elevação lateral com halteres', 12, 5),
('Prancha Abdominal', 'Prancha abdominal estática', 30, 0),
('Extensão de Tríceps na Polia', 'Extensão de tríceps com polia alta', 12, 15),
('Cadeira Abdutora', 'Exercício de abdução de pernas', 15, 0),
('Rosca Alternada', 'Rosca alternada com halteres', 12, 8),
('Remada Unilateral', 'Remada com halteres unilateral', 12, 12),
('Abdominal Crunch', 'Abdominal crunch no chão', 20, 0),
('Elevação de Calcanhares', 'Elevação de calcanhares em pé', 15, 0),
('Prensa de Pernas', 'Exercício de prensa de pernas', 12, 80),
('Encolhimento de Ombros', 'Encolhimento de ombros com halteres', 15, 10);

SELECT * FROM gym_workouts;
SELECT * FROM gym_exercises;

DROP TABLE gym_workouts;

SET SQL_SAFE_UPDATES=0;
delete from gym_workouts;
delete from gym_exercises;

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
