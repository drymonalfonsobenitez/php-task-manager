<?php
/**
 * Modelo Task
 * Gestiona operaciones CRUD sobre la tabla tasks
 */

class Task {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Obtiene todas las tareas ordenadas por fecha
     */
    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    /**
     * Obtiene una tarea por su ID
     */
    public function getById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        $task = $stmt->fetch();
        return $task ?: null;
    }

    /**
     * Crea una nueva tarea
     */
    public function create(string $title, string $description, string $status): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$title, $description, $status]);
    }

    /**
     * Actualiza una tarea existente
     */
    public function update(int $id, string $title, string $description, string $status): bool {
        $stmt = $this->db->prepare(
            "UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?"
        );
        return $stmt->execute([$title, $description, $status, $id]);
    }

    /**
     * Elimina una tarea
     */
    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Cuenta tareas por estado
     */
    public function countByStatus(): array {
        $stmt = $this->db->query(
            "SELECT status, COUNT(*) as total FROM tasks GROUP BY status"
        );
        return $stmt->fetchAll();
    }
}
