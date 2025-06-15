<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ramen extends Model
{
    use HasFactory;

    // app/Models/Ramen.php

protected $fillable = [
    'user_id',
    'shop_name',
    'prefecture_name',
    'ate_on',
    'review',
    'image_path',
    'shop_url',
    'is_recommended',
];

protected $casts = [
    'ate_on' => 'date',
    'is_recommended' => 'boolean',
];

public function user()
{
    return $this->belongsTo(User::class);
}


}
