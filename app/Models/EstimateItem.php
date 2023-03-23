<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstimateItem extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'qte',
        'price',
        'estimate_id',
    ];

    protected $casts = [
        'client_id' => 'integer',
        'editor_id' => 'integer',
    ];

    public function estimate() : BelongsTo
    {
        return $this->belongsTo(Estimate::class, 'estimate_id');
    }
}
