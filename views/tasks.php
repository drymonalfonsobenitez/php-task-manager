<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager - Drymon Alfonso</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; background: #f5f6fa; color: #2d3436; padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; }
        header { background: #0984e3; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        header h1 { font-size: 24px; }
        header p { opacity: 0.9; font-size: 14px; margin-top: 5px; }
        .stats { display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; }
        .stat { background: white; padding: 15px; border-radius: 8px; flex: 1; min-width: 120px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .stat .num { font-size: 28px; font-weight: bold; color: #0984e3; }
        .stat .label { font-size: 12px; color: #636e72; text-transform: uppercase; }
        .btn { display: inline-block; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 500; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary { background: #0984e3; color: white; }
        .btn-primary:hover { background: #0770c4; }
        .btn-secondary { background: #dfe6e9; color: #2d3436; }
        .btn-danger { background: #d63031; color: white; }
        .btn-sm { padding: 6px 12px; font-size: 12px; }
        .task { background: white; padding: 20px; border-radius: 8px; margin-bottom: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); border-left: 4px solid #0984e3; }
        .task h3 { font-size: 18px; margin-bottom: 8px; }
        .task p { color: #636e72; font-size: 14px; margin-bottom: 12px; }
        .badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; }
        .badge-pending { background: #ffeaa7; color: #6c5ce7; }
        .badge-in_progress { background: #74b9ff; color: #2d3436; }
        .badge-completed { background: #55efc4; color: #00b894; }
        .actions { margin-top: 12px; display: flex; gap: 8px; }
        .empty { background: white; padding: 40px; text-align: center; border-radius: 8px; color: #636e72; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>📋 Task Manager</h1>
            <p>Desarrollado por Drymon Alfonso Benítez | PHP + MySQL + MVC</p>
        </header>

        <div class="stats">
            <?php foreach ($stats as $stat): ?>
                <div class="stat">
                    <div class="num"><?= $stat['total'] ?></div>
                    <div class="label"><?= htmlspecialchars($stat['status']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="index.php?action=create" class="btn btn-primary">+ Nueva Tarea</a>
        <hr style="margin: 20px 0; border: none; border-top: 1px solid #dfe6e9;">

        <?php if (empty($tasks)): ?>
            <div class="empty">
                <p>No hay tareas todavía. ¡Crea la primera!</p>
            </div>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <div class="task">
                    <h3><?= htmlspecialchars($task['title']) ?></h3>
                    <p><?= htmlspecialchars($task['description']) ?></p>
                    <span class="badge badge-<?= $task['status'] ?>">
                        <?= htmlspecialchars($task['status']) ?>
                    </span>
                    <div class="actions">
                        <a href="index.php?action=edit&id=<?= $task['id'] ?>" class="btn btn-secondary btn-sm">✏️ Editar</a>
                        <a href="index.php?action=delete&id=<?= $task['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta tarea?')">🗑️ Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
