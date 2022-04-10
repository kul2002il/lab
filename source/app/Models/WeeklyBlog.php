<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class WeeklyBlog extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'weekly_blog';
    public $timestamps = false;

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function dailyBlogs()
    {
        return $this->hasMany(DailyBlog::class, 'week_blog_id');
    }
}
