<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class Project extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'project';
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function blogRecords()
    {
        return $this->hasMany(BlogRecord::class);
    }
}
