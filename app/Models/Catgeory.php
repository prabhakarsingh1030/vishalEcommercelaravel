<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catgeory extends Model
{
    use HasFactory;

    protected $table = 'catgeories';
        protected  $primaryKey = 'id';
        protected $fillable = [];
    
}
