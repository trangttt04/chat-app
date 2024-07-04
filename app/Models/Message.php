<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'ch_messages';
    protected $guarded = [];

    public function from_user(){
        return $this->belongsTo(User::class,'from_id');
    }
}
