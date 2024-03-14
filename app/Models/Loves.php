<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loves extends Model
{
    use HasFactory;
    protected $table = 'loves';


    public function studentRelation(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
