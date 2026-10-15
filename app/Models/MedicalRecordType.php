<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MedicalRecord;

class MedicalRecordType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'should_validate',
        'details'
    ];

    public function records()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
