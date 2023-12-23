<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'plan_id',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
