<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Padlock extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'padlock_type_id',
        'price',
        'qty',
        'deleted_at',
    ];

    protected $appends = [
        'pad_type',
    ];

    protected function padType(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->padlockType()->first(),
        );
    }

    public function padlockType()
    {
        return $this->belongsTo(PadlockType::class);
    }
}
