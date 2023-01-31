<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvou extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'time',
        // 'hour',
        'prescription',
        'disease',
        'motif',
        'state',
        'name',
        'phone',
        'admin_id',
        'patient_id',
        'assistant_id',
        'doctor_id',
        'dossiermedical_id',
    ];
    public function doctor()
    {
        return $this->belongsTo(User::class,"doctor_id");
    }
    public function patient()
    {
        return $this->belongsTo(User::class,"patient_id");
    }
    public function assistant()
    {
        return $this->belongsTo(User::class,"assistant_id");
    }
    public function dossier()
    {
        return $this->belongsTo(DossierMedical::class);
    }
}
