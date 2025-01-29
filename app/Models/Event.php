<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Definir la tabla asociada (opcional si sigue la convención)
    protected $table = 'events';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'title',
        'description',
        'date_time',
        'location',
        'price',
        'available_tickets',
        'image_path'
    ];

    // Relación con reservas (un evento puede tener muchas reservas)
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Mutador para dar formato a la fecha
    public function getFormattedDateAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->date_time));
    }

    // Scope para eventos futuros
    public function scopeUpcoming($query)
    {
        return $query->where('date_time', '>=', now())->orderBy('date_time', 'asc');
    }
}

