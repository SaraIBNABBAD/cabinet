<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'date',
        'hour',
        'arrangement',
        'disease',
        'motif',
        'verified',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dossier()
    {
        return $this->belongsTo(DossierMedical::class);
    }
}
