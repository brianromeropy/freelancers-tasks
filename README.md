# FreelanceTasks

**Repositorio:** [github.com/brianromeropy/freelancers-tasks](https://github.com/brianromeropy/freelancers-tasks)

Plataforma web para **freelancers** que organizan su trabajo por **proyectos** y **tareas** en un tablero tipo Kanban. Proyecto grupal de **Desarrollo Web** — Ingeniería Informática, Universidad Americana (2026).

---

## Integrantes del equipo

| Nombre | Apellido para login | Presentación individual |
|--------|---------------------|-------------------------|
| Brian Romero | `Romero` | Sí |
| Junior Ortiz | `Ortiz` | Sí |
| Rodney Melgarejo | `Melgarejo` | Sí |
| Gaston Pereira | `Pereira` | Sí |

Cada integrante tiene su propia cuenta, proyectos y tareas en la base de datos. El footer y la página **Contáctenos** muestran los datos del usuario que inició sesión.

---

## Stack tecnológico

| Capa | Tecnología |
|------|------------|
| Backend | Laravel 9 |
| Vistas | Blade |
| Estilos | Tailwind CSS 3 + Vite |
| Autenticación | Laravel Breeze (login por apellido) |
| Base de datos | MySQL |
| Idioma de la app | Español (`APP_LOCALE=es`) |
| Control de versiones | Git + GitHub |

---

## Qué hace el sistema (paso a paso)

Esta es la secuencia que debe mostrar cada integrante en su video de sustentación o en la demo en clase.

### Paso 1 — Abrir la aplicación

1. En la PC, tener **MySQL** y **dos terminales** activas (`npm run dev` y `php artisan serve`).
2. Abrir el navegador en: **http://127.0.0.1:8000**
3. La raíz `/` redirige al dashboard; si no hay sesión, Laravel envía al **login**.

### Paso 2 — Iniciar sesión (examen: por apellido)

1. Ir a **http://127.0.0.1:8000/login**
2. Ingresar solo el **apellido** (no el nombre completo) y la contraseña demo del grupo.
3. El sistema busca en la tabla `users` un nombre que **termine** con ese apellido (por ejemplo `Brian Romero` + apellido `Romero`).
4. Si las credenciales son correctas, redirige a **`/dashboard`**.

**Contraseña demo para los 4 usuarios del seeder:** `freelancers2026`

| Integrante | Campo *Apellido* en login |
|------------|---------------------------|
| Brian Romero | `Romero` |
| Junior Ortiz | `Ortiz` |
| Rodney Melgarejo | `Melgarejo` |
| Gaston Pereira | `Pereira` |

> No hace falta registrarse manualmente si ejecutaron `php artisan db:seed` (ver instalación).

### Paso 3 — Dashboard (página de inicio)

En **`/dashboard`** el usuario autenticado ve:

1. **Cabecera del sitio** — Logo FT, menú *Inicio*, *Contáctenos*, nombre del usuario y *Cerrar sesión*.
2. **Banner / hero** — Presentación visual del producto FreelanceTasks.
3. **Equipo del proyecto** — Brian, Junior, Rodney y Gaston (información grupal).
4. **Descripción y diseño** — Colores, tipografía Roboto, objetivo del sistema.
5. **Funcionalidades** — Resumen de lo implementado (proyectos, tareas, Kanban, etc.).
6. **Mis proyectos** — Lista de proyectos **solo del usuario logueado**; se puede crear uno nuevo.
7. **Nueva tarea** — Formulario para agregar tareas al proyecto activo (título, descripción, estado, prioridad).
8. **Tablero Kanban** — Tres columnas según el estado de cada tarea del proyecto seleccionado:
   - **Pendiente**
   - **En progreso**
   - **Finalizado**

Cada tarjeta de tarea permite **cambiar de columna** (actualizar estado) o **eliminar** la tarea.

### Paso 4 — Modelo de datos en la práctica

El flujo de negocio implementado es:

```
Usuario → Proyecto(s) → Tarea(s) → Estado (pendiente | en_progreso | finalizado)
```

- Un **proyecto** agrupa las tareas de un cliente o encargo (ejemplo del seeder: *Freelance Tracker Lite*).
- Cada **tarea** tiene título, descripción, **prioridad** (`baja`, `media`, `alta`) y **estado**.
- En el dashboard se filtra por proyecto con `?project=id` en la URL.
- Los datos **no se comparten** entre integrantes: cada uno ve únicamente sus proyectos y tareas (`user_id`).

### Paso 5 — Contáctenos (presentación individual)

1. Ir a **http://127.0.0.1:8000/contacto** (requiere sesión).
2. Se muestra el **formulario de contacto** (maquetado; el envío por correo queda para una fase futura).
3. La sección **Alumno presentador** y el **footer** de todas las páginas usan el perfil del usuario logueado.
4. Los textos personalizados (nombre completo, correo, teléfono) se editan en un solo archivo: **`config/presenters.php`** (clave = email del usuario en la BD).

### Paso 6 — Cerrar sesión

Desde el menú superior → **Cerrar sesión** → vuelve al login.

---

## Instalación en tu computadora (guía para el equipo)

Sigue estos pasos **en orden** la primera vez. Si ya clonaste antes, después de un `git pull` suele bastar con los pasos de la sección *Actualizar el proyecto*.

### Requisitos previos

Instalar **antes** de clonar:

| Herramienta | Versión | Dónde obtenerla |
|-------------|---------|-----------------|
| PHP | 8.0+ (recomendado 8.1+) | [XAMPP](https://www.apachefriends.org/) o Laragon |
| Composer | 2.x | [getcomposer.org](https://getcomposer.org/) |
| Node.js | 18+ (incluye npm) | [nodejs.org](https://nodejs.org/) |
| MySQL | 5.7+ / 8.x | Viene con XAMPP |
| Git | Reciente | [git-scm.com](https://git-scm.com/) |

**En XAMPP:** abrir el panel de control e **iniciar Apache y MySQL** antes de migrar o usar la app.

#### Windows: si `php` no se reconoce en PowerShell

Usar la ruta completa de XAMPP en todos los comandos `php artisan`:

```powershell
$php = "C:\xampp\php\php.exe"
```

Ejemplo: `& $php artisan migrate` en lugar de `php artisan migrate`.

---

### Paso A — Clonar el repositorio

```powershell
git clone https://github.com/brianromeropy/freelancers-tasks.git
cd freelancers-tasks
```

> Si el nombre de la carpeta local es `freelancers`, entrar a esa carpeta en los siguientes pasos.

---

### Paso B — Dependencias de PHP

```powershell
composer install
```

Si Composer se queja por la versión de PHP en Windows:

```powershell
composer install --ignore-platform-reqs
```

---

### Paso C — Archivo de entorno

```powershell
copy .env.example .env
php artisan key:generate
```

En Windows con variable `$php`:

```powershell
copy .env.example .env
& $php artisan key:generate
```

Editar **`.env`** (este archivo **no** se sube a Git). Valores mínimos:

```env
APP_NAME=FreelanceTasks
APP_LOCALE=es
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=freelancers_tasks
DB_USERNAME=root
DB_PASSWORD=
```

`DB_PASSWORD` vacío es lo habitual en XAMPP con usuario `root`. Si tu MySQL tiene contraseña, colócala ahí.

---

### Paso D — Crear la base de datos

1. Abrir **phpMyAdmin**: http://localhost/phpmyadmin
2. Crear una base nueva llamada exactamente: **`freelancers_tasks`**
3. Cotejamiento: `utf8mb4_unicode_ci` (por defecto en MySQL 8)

---

### Paso E — Tablas y datos de demostración

**Primera instalación** (crea tablas + 4 usuarios + proyectos + tareas demo):

```powershell
php artisan migrate --force
php artisan db:seed --force
```

Para **reiniciar todo** desde cero (borra datos anteriores):

```powershell
php artisan migrate:fresh --seed --force
```

Con XAMPP:

```powershell
& $php artisan migrate --force
& $php artisan db:seed --force
```

---

### Paso F — Dependencias del frontend (Tailwind / Vite)

```powershell
npm install
```

---

### Paso G — Levantar el proyecto (dos terminales abiertas)

**Terminal 1** — compila CSS/JS en caliente (dejar corriendo):

```powershell
npm run dev
```

**Terminal 2** — servidor Laravel:

```powershell
php artisan serve
```

Abrir: **http://127.0.0.1:8000/login** → apellido + `freelancers2026` → dashboard.

#### Demo sin `npm run dev` (opcional)

```powershell
npm run build
php artisan serve
```

---

### Paso H — Personalizar tu presentación individual

1. **Login** — Usa tu apellido de la tabla de integrantes (arriba).
2. **Contáctenos y footer** — Edita solo tu bloque en `config/presenters.php` (correo y teléfono reales si el profe lo pide).
3. **No edites** `contacto.blade.php` ni el footer en `layouts/app.blade.php` para cambiar el nombre: ya es dinámico.

---

## Actualizar el proyecto (después de `git pull`)

```powershell
git pull origin main
composer install
npm install
php artisan migrate --force
```

Si Brian subió cambios al seeder o quieren datos demo limpios:

```powershell
php artisan db:seed --force
```

Reiniciar las dos terminales (`npm run dev` y `php artisan serve`).

---

## Problemas frecuentes

| Problema | Qué hacer |
|----------|-----------|
| Página sin estilos / fea | Dejar `npm run dev` corriendo o ejecutar `npm run build` |
| `Vite manifest not found` | `npm run dev` o `npm run build` |
| Error SQL / conexión rechazada | Verificar MySQL en XAMPP y valores de `.env` |
| Base no existe | Crear `freelancers_tasks` en phpMyAdmin |
| `php` o `composer` no reconocido | Usar `C:\xampp\php\php.exe` y ruta a `composer.phar` |
| Login: apellido incorrecto | Usar solo apellido (`Romero`, no `Brian Romero`) |
| Login: contraseña incorrecta | `freelancers2026` tras `db:seed` |
| 419 al enviar formularios | `APP_URL` debe coincidir con la URL del navegador |
| No aparecen proyectos/tareas | `php artisan db:seed --force` |

---

## Rutas principales

| URL | Descripción | ¿Requiere login? |
|-----|-------------|------------------|
| `/` | Redirige al dashboard | Sí |
| `/login` | Inicio de sesión por apellido | No |
| `/register` | Registro Breeze (opcional) | No |
| `/dashboard` | Inicio, proyectos, Kanban | Sí |
| `/contacto` | Formulario y datos del presentador | Sí |
| `POST /projects` | Crear proyecto | Sí |
| `POST /tasks` | Crear tarea | Sí |
| `PATCH /tasks/{id}` | Cambiar estado / datos | Sí |
| `DELETE /tasks/{id}` | Eliminar tarea | Sí |

---

## Estructura del proyecto (resumen)

```
freelancers/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/                 # Login Breeze (apellido)
│   │   ├── DashboardController.php
│   │   ├── ContactController.php
│   │   ├── ProjectController.php
│   │   └── TaskController.php
│   ├── Http/Requests/Auth/LoginRequest.php
│   └── Models/
│       ├── User.php              # presenterProfile()
│       ├── Project.php
│       └── Task.php
├── config/
│   └── presenters.php            # Datos individuales footer + contacto
├── database/
│   ├── migrations/               # users, tasks, projects, ...
│   └── seeders/DatabaseSeeder.php  # 4 integrantes + demo
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── dashboard.blade.php
│   ├── contacto.blade.php
│   ├── components/task-card.blade.php
│   └── auth/login.blade.php
├── routes/web.php
├── lang/es/                      # Traducciones
├── SETUP.md                      # Guía extendida (PHP 8.1+, Breeze)
└── docs/GIT-EQUIPO.md            # Flujo Git del grupo
```

---

## Trabajo en equipo con Git

Guía detallada: **[docs/GIT-EQUIPO.md](docs/GIT-EQUIPO.md)**

```powershell
git pull origin main
# ... trabajar ...
git add .
git commit -m "feat: descripción clara del cambio"
git push origin main
```

**No subir a Git:** `.env`, `vendor/`, `node_modules/`, `public/hot`.

---

## Estado del proyecto y fases futuras

| Funcionalidad | Estado |
|---------------|--------|
| Login por apellido + dashboard | Listo |
| Proyectos y tareas por usuario | Listo |
| Kanban (3 estados) | Listo |
| Contáctenos + footer por usuario logueado | Listo |
| Seeder con 4 cuentas individuales | Listo |
| Envío real del formulario de contacto | Pendiente |
| Control de tiempos / horas | Próxima fase |

---

## Licencia y uso académico

Proyecto educativo — facultad. Uso acorde a las normas del curso de Desarrollo Web.
