<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable()->after('user_id')->constrained()->cascadeOnDelete();
        });

        DB::table('tasks')->where('status', 'todo')->update(['status' => 'pendiente']);
        DB::table('tasks')->where('status', 'in_progress')->update(['status' => 'en_progreso']);
        DB::table('tasks')->where('status', 'done')->update(['status' => 'finalizado']);
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropConstrainedForeignId('project_id');
        });

        DB::table('tasks')->where('status', 'pendiente')->update(['status' => 'todo']);
        DB::table('tasks')->where('status', 'en_progreso')->update(['status' => 'in_progress']);
        DB::table('tasks')->where('status', 'finalizado')->update(['status' => 'done']);
    }
};
