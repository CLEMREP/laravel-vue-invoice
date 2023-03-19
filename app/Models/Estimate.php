<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estimate extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'estimateId',
        'createDate',
        'dueDate',
        'discount',
        'subTotal',
        'total',
        'client_id',
        'editor_id',
    ];

    protected $casts = [
        'client_id' => 'integer',
        'editor_id' => 'integer',
    ];

    public function editor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function client() : BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function items() : HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
