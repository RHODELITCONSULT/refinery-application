<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignor extends Model
{
    use HasFactory;

    protected $fillable = ["consignor","address","city","contact_email","contact_number","landmark"];
}
