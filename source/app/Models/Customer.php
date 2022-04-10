<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class Customer extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'customer';
    public $timestamps = false;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
