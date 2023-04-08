<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossiermedical extends Model
{
    use HasFactory;
    protected $fillable = [
        'prescription',
        'report',
        'cnssSheet',
        'balanceSheet',
        'doc_id',
        'patnt_id',

    ];
    public function rendezVous()
    {
        return $this->hasMany(Rendezvou::class);
    }

}