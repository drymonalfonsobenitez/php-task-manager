# PHP Task Manager

Sistema de gestión de tareas desarrollado en PHP puro con arquitectura MVC, conexión a MySQL mediante PDO y operaciones CRUD completas.

## Tecnologías
- PHP 8+
- MySQL
- PDO (PHP Data Objects)
- HTML5 / CSS3
- Arquitectura MVC

## Características
- ✅ Crear tareas
- ✅ Listar tareas
- ✅ Editar tareas
- ✅ Eliminar tareas
- ✅ Estados: Pendiente, En Progreso, Completada
- ✅ Código organizado en Modelo, Vista y Controlador

## Estructura del proyecto
```

php-task-manager/
├── index.php          # Controlador frontal
├── config.php         # Conexión a base de datos
├── Task.php           # Modelo de tareas
├── database.sql       # Esquema de base de datos
├── views/
│   ├── tasks.php      # Vista: lista de tareas
│   └── task_form.php  # Vista: formulario crear/editar
└── README.md

```

## Instalación
1. Importar `database.sql` en MySQL
2. Configurar credenciales en `config.php`
3. Ejecutar: `php -S localhost:8000`
4. Abrir: `http://localhost:8000`

## Autor
**Drymon Alfonso Benítez**
Ingeniero en Ciencias Informáticas (UCI, 2018)
```
