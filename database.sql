-- Base de datos para Task Manager
CREATE DATABASE IF NOT EXISTS task_manager;
USE task_manager;

-- Tabla de tareas
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Datos de ejemplo
INSERT INTO tasks (title, description, status) VALUES
('Aprender Laravel', 'Estudiar fundamentos del TALL stack', 'pending'),
('Actualizar CV', 'Añadir proyectos de GitHub', 'in_progress'),
('Aplicar a ofertas', 'Enviar CV a 10 empresas', 'completed');
