# FreelanceTasks

**Repositorio:** [github.com/brianromeropy/freelancers-tasks](https://github.com/brianromeropy/freelancers-tasks)

Plataforma web de gestión de tareas para **freelancers** (proyecto grupal — Desarrollo Web). Inspirada en un clon simplificado de Azure DevOps.

## Stack tecnológico

| Capa | Tecnología |
|------|------------|
| Backend / Frontend | Laravel 9 + Blade |
| Estilos | Tailwind CSS 3 + Vite |
| Autenticación | Laravel Breeze (login / registro) |
| Base de datos | MySQL |
| Control de versiones | Git + GitHub |

---

## Qué está hecho (estado actual)

### Completado

- Proyecto Laravel 9 configurado.
- **Laravel Breeze**: login, registro, logout (`/login`, `/register`).
- **MySQL**: base `freelancers_tasks` (cada dev la crea en su máquina).
- **Migración `tasks`**: título, descripción, estado (`todo`, `in_progress`, `done`), prioridad (`baja`, `media`, `alta`), relación con `users`.
- Modelos `User` y `Task` con relación uno-a-muchos.
- **Dashboard** (`/dashboard`): integrantes, descripción del proyecto, diseño (colores, Roboto, logo), 3 funcionalidades propuestas.
- **Contáctenos** (`/contacto`): mismo layout, formulario maquetado, sección del alumno presentador.
- Layout común con cabecera (azul / gris oscuro) y navegación.

### Pendiente (para el equipo)

- [ ] Completar nombres en `resources/views/dashboard.blade.php`.
- [ ] Completar datos en `resources/views/contacto.blade.php` + imagen en `public/images/`.
- [ ] CRUD de tareas y tablero Kanban (funcionalidades propuestas).
- [ ] Envío real del formulario de contacto (opcional).
- [ ] Subir repositorio a GitHub y enlazar a todos los integrantes.

---

## Requisitos en cada PC

Instalar **antes** de clonar:

| Herramienta | Versión recomendada | Notas |
|-------------|---------------------|--------|
| PHP | 8.0+ (ideal 8.1+) | XAMPP, Laragon o PHP standalone |
| Composer | 2.x | [getcomposer.org](https://getcomposer.org/) |
| Node.js | 18+ | Incluye `npm` |
| MySQL | 5.7+ / 8.x | XAMPP: iniciar Apache + MySQL |
| Git | Cualquier reciente | [git-scm.com](https://git-scm.com/) |

### Windows + XAMPP (ejemplo)

Si `php` y `composer` no están en el PATH:

```powershell
$php = "C:\xampp\php\php.exe"
# Composer: usar composer global o composer.phar en la carpeta del proyecto
```

---

## Instalación rápida (compañeros que clonan el repo)

### 1. Clonar el repositorio

```powershell
git clone https://github.com/brianromeropy/freelancers-tasks.git
cd freelancers-tasks
```

> Sustituir la URL por la del repositorio real del grupo.

### 2. Dependencias PHP

```powershell
composer install
```

Si falla por versión de PHP en Windows con XAMPP antiguo:

```powershell
composer install --ignore-platform-reqs
```

### 3. Archivo de entorno

```powershell
copy .env.example .env
php artisan key:generate
```

Editar `.env` (no se sube a Git):

```env
APP_NAME=FreelanceTasks
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=freelancers_tasks
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Base de datos

1. Abrir **phpMyAdmin** (o MySQL Workbench).
2. Crear la base: `freelancers_tasks`.
3. Ejecutar migraciones:

```powershell
php artisan migrate
```

### 5. Dependencias frontend

```powershell
npm install
```

### 6. Levantar el proyecto (dos terminales)

**Terminal 1 — assets (Tailwind / Vite):**

```powershell
npm run dev
```

**Terminal 2 — servidor Laravel:**

```powershell
php artisan serve
```

Abrir en el navegador: **http://127.0.0.1:8000**

### 7. Primera cuenta

Ir a **http://127.0.0.1:8000/register**, crear un usuario y luego entrar a `/dashboard`.

---

## Problemas frecuentes al compilar

| Problema | Solución |
|----------|----------|
| Página sin estilos | Dejar corriendo `npm run dev` o ejecutar `npm run build` |
| `Vite manifest not found` | `npm run build` o iniciar `npm run dev` |
| Error de conexión MySQL | Verificar que MySQL esté activo y que `.env` tenga `DB_DATABASE=freelancers_tasks` |
| Base no existe | Crear `freelancers_tasks` en phpMyAdmin |
| `php` / `composer` no reconocido | Usar ruta completa de XAMPP o agregar al PATH |
| 419 / CSRF al login | Borrar cookies, revisar que `APP_URL` coincida con la URL del navegador |
| Tras `git pull`, errores raras | `composer install` + `npm install` + `php artisan migrate` |

---

## Trabajo en equipo con Git

Ver guía detallada: **[docs/GIT-EQUIPO.md](docs/GIT-EQUIPO.md)**

Resumen:

```powershell
# Antes de empezar a programar
git pull origin main

# Al terminar una tarea
git add .
git commit -m "Descripción clara del cambio"
git push origin main
```

**Reglas del grupo**

- No subir `.env` (contiene contraseñas locales).
- No subir `vendor/` ni `node_modules/` (se regeneran con `composer install` y `npm install`).
- Hacer `pull` antes de `push` para evitar conflictos.
- Mensajes de commit claros: `feat: tablero kanban`, `fix: login redirect`, etc.

---

## Estructura del proyecto

```
freelancers/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/              # Login, registro (Breeze)
│   │   ├── DashboardController.php
│   │   └── ContactController.php
│   └── Models/
│       ├── User.php
│       └── Task.php
├── database/migrations/
│   └── 2026_05_19_000001_create_tasks_table.php
├── resources/views/
│   ├── layouts/app.blade.php  # Cabecera común
│   ├── dashboard.blade.php
│   ├── contacto.blade.php
│   └── auth/                  # Vistas de login
├── routes/
│   ├── web.php                # Dashboard, contacto
│   └── auth.php               # Rutas Breeze
├── .env.example               # Plantilla (copiar a .env)
├── SETUP.md                   # Guía extendida de instalación
└── docs/GIT-EQUIPO.md         # Flujo Git para el grupo
```

---

## Rutas principales

| URL | Descripción | Auth |
|-----|-------------|------|
| `/` | Redirige al dashboard | Sí |
| `/login` | Iniciar sesión | No |
| `/register` | Registrarse | No |
| `/dashboard` | Página de inicio (examen) | Sí |
| `/contacto` | Formulario de contacto | Sí |

---

## Entrega / producción

Para demo sin `npm run dev`:

```powershell
npm run build
php artisan serve
```

Los archivos compilados quedan en `public/build/`.

---

## Integrantes

| Nombre | Rol | Contacto |
|--------|-----|----------|
| [Completar] | Líder / Backend | |
| [Completar] | Frontend / Diseño | |
| [Completar] | Base de datos / QA | |

---

## Licencia y uso académico

Proyecto educativo — facultad. Uso acorde a las normas del curso.
