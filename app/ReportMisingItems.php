<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMisingItems extends Model
{
    //
    protected $fillable = [
        'name','email', 'phone_number', 'address', 'category', 'item_name', 'item_desc', 'item_image', 'status',
    ];
}
