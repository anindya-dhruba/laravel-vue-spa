<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * One to Many Relationship 
     *
     * @return
     */
    public function messages()
    {
      return $this->hasMany(Message::class);
    }
}
