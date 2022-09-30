<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'provider',
        'price',
        'stock_max',
        'stock_min',
        'stock_realtime',
        'categorie_id'
    ];

    public function categorie() 
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
