<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Item extends Model
// {
//     use HasFactory;
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemTitle',
        'itemDisc',
        'itemDuration',
        'itemStartPrice',
        'currentWinner',
        // Add other columns here as needed
    ];
}
