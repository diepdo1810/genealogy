<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wiki extends Model
{
    use HasFactory;

    protected $table = 'wiki';

    protected $fillable = [
        'person_id',
        'lang',
        'content',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
