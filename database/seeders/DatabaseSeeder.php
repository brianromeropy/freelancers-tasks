<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $demoPassword = Hash::make('freelancers2026');

        $integrantes = [
            ['name' => 'Brian Romero', 'email' => 'brian.romero@freelancers.local'],
            ['name' => 'Junior Ortiz', 'email' => 'junior.ortiz@freelancers.local'],
            ['name' => 'Rodney Melgarejo', 'email' => 'rodney.melgarejo@freelancers.local'],
            ['name' => 'Gaston Pereira', 'email' => 'gaston.pereira@freelancers.local'],
        ];

        $demoTasks = [
            [
                'title' => 'Diseño de wireframes',
                'description' => 'Prototipos de pantallas para el módulo de tareas del cliente.',
                'status' => 'pendiente',
                'priority' => 'alta',
            ],
            [
                'title' => 'Conexión de Base de Datos',
                'description' => 'Configurar MySQL, migraciones y relación proyecto-tareas.',
                'status' => 'en_progreso',
                'priority' => 'media',
            ],
            [
                'title' => 'Setup de Laravel',
                'description' => 'Instalación de Laravel Breeze, autenticación y entorno XAMPP.',
                'status' => 'finalizado',
                'priority' => 'baja',
            ],
        ];

        foreach ($integrantes as $integrante) {
            $user = User::updateOrCreate(
                ['email' => $integrante['email']],
                [
                    'name' => $integrante['name'],
                    'password' => $demoPassword,
                ]
            );

            $project = Project::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'name' => 'Freelance Tracker Lite',
                ],
                [
                    'description' => 'Proyecto demo — presentación individual. Modelo: Proyecto → Tareas → Estados.',
                ]
            );

            foreach ($demoTasks as $task) {
                Task::updateOrCreate(
                    [
                        'project_id' => $project->id,
                        'title' => $task['title'],
                    ],
                    [
                        'user_id' => $user->id,
                        'description' => $task['description'],
                        'status' => $task['status'],
                        'priority' => $task['priority'],
                    ]
                );
            }
        }
    }
}
