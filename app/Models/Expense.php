<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $table = 'expense';
    protected $fillable = [
        'amount',
        'category_id',
        'date',
        'description',
        'user_id',
        'is_recurring',
        'recurring_frequency',
    ];
    protected $casts = [
        'date' => 'datetime',
        'is_recurring' => 'boolean',
        'recurring_frequency' => 'string',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'formatted_date',
    ];
    public function getFormattedDateAttribute()
    {
        return $this->date->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
