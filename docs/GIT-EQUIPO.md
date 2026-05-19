# Guía Git para el equipo — FreelanceTasks

Esta guía explica cómo usar Git y GitHub para que **todos los integrantes** puedan clonar, compilar y subir cambios sin pisarse el trabajo.

---

## 1. Quién crea el repositorio (una sola vez)

Lo hace **una persona** del grupo (por ejemplo, el líder):

### En GitHub

1. Entrar a [github.com](https://github.com) → **New repository**.
2. Nombre sugerido: `freelancers-tasks` (o el que acuerden).
3. **No** marcar "Add a README" si ya tienen código local (evita conflictos).
4. Crear el repo y copiar la URL, por ejemplo:  
   `https://github.com/brianromeropy/freelancers-tasks.git`

### En la PC de quien tiene el proyecto listo

Desde la carpeta del proyecto:

```powershell
cd "ruta\al\proyecto\freelancers"

git init
git add .
git commit -m "Initial commit: Laravel, Breeze, migración tasks, dashboard y contacto"
git branch -M main
git remote add origin https://github.com/brianromeropy/freelancers-tasks.git
git push -u origin main
```

> Si GitHub pide login, usar **Personal Access Token** como contraseña (no la contraseña de la cuenta).

### Invitar compañeros

En el repo de GitHub: **Settings → Collaborators → Add people** (cuentas de tus compañeros).

---

## 2. Qué sube Git y qué NO

### Sí se sube (código del equipo)

- Código PHP, Blade, JS, CSS
- `composer.json`, `composer.lock`
- `package.json`, `package-lock.json`
- Migraciones en `database/migrations/`
- `.env.example` (plantilla sin contraseñas reales)

### NO se sube (cada uno lo genera en su PC)

| Archivo / carpeta | Motivo |
|-------------------|--------|
| `.env` | Contraseñas y claves locales |
| `vendor/` | `composer install` |
| `node_modules/` | `npm install` |
| `public/hot` | Vite en desarrollo |
| `public/build/` | Se genera con `npm run build` (opcional subir en releases) |

Esto ya está configurado en `.gitignore`.

---

## 3. Compañeros: primera vez (clonar)

```powershell
# Elegir carpeta de trabajo
cd C:\Users\TU_USUARIO\Documents

git clone https://github.com/brianromeropy/freelancers-tasks.git
cd freelancers-tasks
```

Luego seguir **README.md → Instalación rápida**:

1. `composer install`
2. `copy .env.example .env`
3. `php artisan key:generate`
4. Crear BD `freelancers_tasks` en MySQL
5. Editar `.env`
6. `php artisan migrate`
7. `npm install`
8. Terminal 1: `npm run dev`
9. Terminal 2: `php artisan serve`

---

## 4. Día a día: flujo de trabajo

```text
pull → programar → add → commit → push
```

### Antes de trabajar (siempre)

```powershell
git pull origin main
```

Así traes los cambios que subieron los demás.

### Después de terminar tu parte

```powershell
git status
git add .
git commit -m "feat: descripción breve de lo que hiciste"
git push origin main
```

### Ejemplos de mensajes de commit

- `feat: listado de tareas en dashboard`
- `fix: corrección ruta contacto`
- `docs: actualizar nombres integrantes`
- `style: ajustes Tailwind en login`

---

## 5. Trabajar en ramas (recomendado si son varios)

Evita que todos editen `main` a la vez:

```powershell
# Crear rama para tu tarea
git checkout -b feature/kanban-board

# ... hacer cambios ...

git add .
git commit -m "feat: vista kanban básica"
git push -u origin feature/kanban-board
```

En GitHub: **Pull Request** → otro del grupo revisa → **Merge**.

Luego en `main` local:

```powershell
git checkout main
git pull origin main
```

---

## 6. Conflictos (dos personas editaron lo mismo)

Si `git pull` muestra **conflict**:

1. Abrir los archivos marcados con `<<<<<<<`, `=======`, `>>>>>>>`.
2. Dejar el código correcto (hablar en el grupo si hace falta).
3. Guardar y:

```powershell
git add .
git commit -m "merge: resolver conflicto en nombre-archivo"
git push origin main
```

Archivos donde suelen chocar: `routes/web.php`, `dashboard.blade.php`, `package-lock.json`.

---

## 7. Comandos útiles

| Comando | Para qué sirve |
|---------|----------------|
| `git status` | Ver archivos modificados |
| `git log --oneline -10` | Últimos 10 commits |
| `git diff` | Ver cambios sin commitear |
| `git checkout -- archivo.php` | Descartar cambios en un archivo |
| `git stash` | Guardar cambios temporalmente |
| `git stash pop` | Recuperar cambios guardados |

---

## 8. Checklist antes de presentar / entregar

- [ ] Todos pueden clonar y compilar con README.md
- [ ] `.env.example` actualizado
- [ ] Nombres del grupo en `dashboard.blade.php`
- [ ] Datos de contacto completos
- [ ] `php artisan migrate` funciona en PC limpia
- [ ] Repo en GitHub con todos como colaboradores
- [ ] Último `push` en `main` con todo integrado

---

## 9. Contacto interno del proyecto

| Rol | Responsable | Tarea Git |
|-----|-------------|-----------|
| Admin del repo | [Nombre] | Crear repo, invitar, merge PRs |
| Backend | [Nombre] | Modelos, controladores, migraciones |
| Frontend | [Nombre] | Vistas Blade, Tailwind |

Acuerden en el grupo **quién aprueba** los merge a `main`.
