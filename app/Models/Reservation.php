<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Definir la tabla asociada (opcional si sigue la convención)
    protected $table = 'reservations';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'event_id',
        'num_tickets',
        'total_price',
        'qr_code',
        'status'
    ];

    // Relación: una reserva pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: una reserva pertenece a un evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Mutador para calcular el precio total automáticamente
    public function setTotalPriceAttribute()
    {
        if ($this->event) {
            $this->attributes['total_price'] = $this->num_tickets * $this->event->price;
        }
    }

    // Scope para filtrar reservas activas
    public function scopeActive($query)
    {
        return $query->where('status', 'confirmed');
    }
}

