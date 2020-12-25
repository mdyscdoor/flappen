<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public function isFavoriting($post_id) {
        return (boolean) $this->where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();
    }
    

    
}
