<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'user_id',
        'commande_id',
        'solved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }    

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
