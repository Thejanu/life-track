<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MedicalRecordType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'details',
        'user_id',
        'details',
        'medical_record_type_id',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(MedicalRecordType::class, 'medical_record_type_id', 'id');
    }
}
