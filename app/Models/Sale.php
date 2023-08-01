<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table="sales";
    // protected $table = [
    //     'created_at' => 'datetime:d/m/Y', // Change your format
    //     'updated_at' => 'datetime:d/m/Y',
    // ];
}
