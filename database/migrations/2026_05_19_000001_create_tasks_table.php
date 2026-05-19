PHP
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Este método 'up' se ejecuta cuando creamos las tablas en MySQL.
     * Quitamos el ": void" para evitar cualquier choque estricto de tipos en PHP 8.0.
     */
    public function up()
    {
        // Le ordenamos a MySQL que cree una tabla llamada 'tasks' (tareas)
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Columna ID: Clave primaria autoincremental (1, 2, 3...)
            
            // Relación con la tabla 'users' (freelancers). 
            // Si se elimina un usuario, se borran todas sus tareas asociadas para no dejar basura.
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->string('title'); // Título de la tarea (ej: "Cpu drilling Samsung A13")
            
            $table->text('description')->nullable(); // Descripción larga. El 'nullable' significa que opcionalmente puede ir vacío.
            
            // CAMBIO CLAVE: Cambiamos 'enum' por 'string' para máxima compatibilidad con PHP 8.0.
            // Por defecto, el estado inicial de cualquier tarea será 'todo' (Pendiente).
            $table->string('status')->default('todo'); 
            
            // Cambiamos 'enum' por 'string'. Por defecto la prioridad será 'media'.
            $table->string('priority')->default('media'); 
            
            $table->timestamps(); // Crea dos columnas: 'created_at' (hora de creación) y 'updated_at' (hora de cambio).
        });
    }

    /**
     * Este método 'down' sirve por si metemos la pata y queremos borrar la tabla de MySQL.
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};