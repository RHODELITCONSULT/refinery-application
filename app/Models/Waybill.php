<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waybill extends Model
{
    use HasFactory;

    protected $fillable = [
        "product",
        "category",
        "consignor",
        "added_by",
        "description",
        "volume",
        "opening",
        "closing",
        "unit_number",
        "meter",
        "destination",
        "driver",
        "truck_head_number",
        "truck_trailer_number",
        "customer",
        "order_type",
        "barcode",
    ];
}
