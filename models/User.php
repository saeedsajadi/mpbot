<?php
namespace Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    public $timestamps = true;
    protected $fillable = [
        "id",
        "is_bot",
        "first_name",
        "last_name",
        "username",
        "caller",
        "step",
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
