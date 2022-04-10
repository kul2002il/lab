<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class Department extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'department';
    public $timestamps = false;

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
