<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $primaryKey = 'conta_id';

    protected $fillable = [
        'conta_id',
        'saldo',
    ];

    public function transferencias()
    {
        return $this->hasMany(Transferencia::class);
    }
}
