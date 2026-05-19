# FreelanceTasks — Guía de instalación (facultad)

> **Para el equipo:** lee primero [README.md](README.md) (resumen + compilación) y [docs/GIT-EQUIPO.md](docs/GIT-EQUIPO.md) (Git colaborativo).

Proyecto Laravel: gestor de tareas para freelancers (clon simplificado de Azure DevOps).

## Requisitos

- **PHP 8.1 o superior** (obligatorio). XAMPP con PHP 8.0 no ejecutará Artisan ni Laravel 9 actualizado.
  - Descarga PHP 8.2+ en [windows.php.net](https://windows.php.net/download/) o actualiza XAMPP.
- Composer, Node.js 18+, MySQL (XAMPP/Laragon)
- Git y cuenta de GitHub

En Windows con XAMPP, usa la ruta completa de PHP si no está en el PATH:

```powershell
$php = "C:\xampp\php\php.exe"
```

---

## Orden de comandos (ejecutar en la carpeta del proyecto)

### 1. Dependencias PHP (si aún no están instaladas)

```powershell
cd "c:\Users\unloc\Downloads\9no semestre\Proyecto desarrollo web\freelancers"
& $php ..\composer.phar install --ignore-platform-reqs
```

### 2. Variables de entorno y clave

```powershell
copy .env.example .env
& $php artisan key:generate
```

Edita `.env` y configura MySQL:

```env
APP_NAME=FreelanceTasks
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=freelancers_tasks
DB_USERNAME=root
DB_PASSWORD=
```

Crea la base en phpMyAdmin: `freelancers_tasks`.

### 3. Laravel Breeze (login clásico + Blade + Tailwind)

El paquete `laravel/breeze` ya está en el proyecto y los archivos de autenticación fueron copiados (`routes/auth.php`, controladores `Auth/*`, vistas `auth/*`).

Si usas PHP 8.1+, puedes reinstalar con:

```powershell
& $php artisan breeze:install blade
```

> No sobrescribas `routes/web.php` ni `dashboard.blade.php` sin respaldo; ya incluyen el examen.

### 4. Migraciones (usuarios + tareas)

```powershell
& $php artisan migrate
```

### 5. Frontend (Tailwind + Vite)

```powershell
npm install
npm run dev
```

En otra terminal, servidor Laravel:

```powershell
& $php artisan serve
```

Abre: http://127.0.0.1:8000

### 6. Usuario de prueba (opcional)

Regístrate en `/register` o usa tinker:

```powershell
& $php artisan tinker
# User::factory()->create(['email' => 'demo@test.com', 'password' => bcrypt('password')]);
```

### 7. Subir a GitHub

```powershell
git init
git add .
git commit -m "Estructura inicial: Laravel, Breeze, migración tasks, dashboard y contacto"
git branch -M main
git remote add origin https://github.com/TU_USUARIO/freelancers-tasks.git
git push -u origin main
```

---

## Archivos clave del examen

| Requerimiento | Archivo |
|---------------|---------|
| Migración `tasks` | `database/migrations/2026_05_19_000001_create_tasks_table.php` |
| Modelo Task | `app/Models/Task.php` |
| Rutas web | `routes/web.php` + `routes/auth.php` (Breeze) |
| Dashboard | `resources/views/dashboard.blade.php` |
| Contáctenos | `resources/views/contacto.blade.php` |
| Layout común | `resources/views/layouts/app.blade.php` |
| Controladores | `DashboardController`, `ContactController` |

---

## Personalizar antes de entregar

- Sustituir `[Nombre Integrante X]` en `dashboard.blade.php`
- Completar datos del presentador en `contacto.blade.php`
- Agregar imagen técnica en la carpeta `public/images/`
