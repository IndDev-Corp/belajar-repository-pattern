<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nominal',
        'note',
        'finance_category_id',
    ];

    public function finance_category()
    {
        return $this->belongsTo(FinanceCategory::class);
    }
}
