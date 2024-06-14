<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'conta_id',
        'valor',
        'tipo',
    ];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }
}
