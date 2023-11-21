<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'adresses'; 
    public $timestamps = false; // Désactive les colonnes "created_at" et "updated_at"


    protected $fillable = [
       'ville',
       'contact_id', 
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
