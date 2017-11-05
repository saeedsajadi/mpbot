<?php
namespace Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent
{
    public $table = 'messages';
    public $timestamps = true;
    protected $fillable = [
        "text",
    ];
}
