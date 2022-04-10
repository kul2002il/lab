<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class Worker extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'worker';
    protected $primaryKey = 'nick';
    protected $keyType = 'string';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'nick', 'nick');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function weeklyBlogs()
    {
        return $this->hasMany(WeeklyBlog::class);
    }
}
