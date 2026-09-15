<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($task) ? 'Editar' : 'Nueva' ?> Tarea - Task Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; background: #f5f6fa; color: #2d3436; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        header { background: #0984e3; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        header h1 { font-size: 22px; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        label { display: block; margin-top: 20px; font-weight: 600; font-size: 14px; color: #2d3436; }
        input[type="text"], textarea, select {
            width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #dfe6e9;
            border-radius: 6px; font-size: 14px; font-family: inherit;
        }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #0984e3; }
        textarea { height: 120px; resize: vertical; }
        .actions { margin-top: 25px; display: flex; gap: 10px; }
        .btn { display: inline-block; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: 500; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary { background: #0984e3; color: white; }
        .btn-primary:hover { background: #0770c4; }
        .btn-secondary { background: #dfe6e9; color: #2d3436; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><?= isset($task) ? '✏️ Editar Tarea' : '➕ Nueva Tarea' ?></h1>
        </header>
        <div class="card">
            <form method="POST">
                <label for="title">Título *</label>
                <input type="text" name="title" id="title" required
                       value="<?= isset($task) ? htmlspecialchars($task['title']) : '' ?>"
                       placeholder="Ej: Aprender Laravel">

                <label for="description">Descripción</label>
                <textarea name="description" id="description"
                          placeholder="Describe la tarea..."><?= isset($task) ? htmlspecialchars($task['description']) : '' ?></textarea>

                <label for="status">Estado</label>
                <select name="status" id="status">
                    <option value="pending" <?= (isset($task) && $task['status'] === 'pending') ? 'selected' : '' ?>>⏳ Pendiente</option>
                    <option value="in_progress" <?= (isset($task) && $task['status'] === 'in_progress') ? 'selected' : '' ?>>🔄 En Progreso</option>
                    <option value="completed" <?= (isset($task) && $task['status'] === 'completed') ? 'selected' : '' ?>>✅ Completada</option>
                </select>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">💾 Guardar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
