<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class DailyBlog extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'daily_blog';
    public $timestamps = false;

    public function weeklyBlog()
    {
        return $this->belongsTo(WeeklyBlog::class, 'week_blog_id');
    }

    public function blogRecords()
    {
        return $this->hasMany(BlogRecord::class, 'blog_id');
    }
}
