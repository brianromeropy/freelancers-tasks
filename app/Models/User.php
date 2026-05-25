<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Datos de presentación individual (footer, Contáctenos).
     *
     * @return array{full_name: string, footer_name: string, career: string, contact_email: string, phone: string}
     */
    public function presenterProfile(): array
    {
        $profiles = config('presenters.profiles', []);
        $profile = $profiles[$this->email] ?? null;

        if ($profile !== null) {
            return $profile;
        }

        $default = config('presenters.default', []);

        return [
            'full_name' => $this->name,
            'footer_name' => $this->name,
            'career' => $default['career'] ?? 'Ingeniería Informática',
            'contact_email' => $this->email,
            'phone' => $default['phone'] ?? '',
        ];
    }
}
