<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mobile extends Model
{
    use HasFactory;
    
    protected $table = 'mobiles';

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
