<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'code_departure',
        'code_arrival',
        'price',
        'belongsTo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'double',
    ];

    public function departure_airport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'code_departure', 'code');
    }

    public function arrival_airport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'code_arrival', 'code');
    }
}
