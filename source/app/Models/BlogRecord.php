<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class BlogRecord extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'blog_record';
    public $timestamps = false;

    public function dailyBlog()
    {
        return $this->belongsTo(DailyBlog::class, 'blog_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
