<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message'];
    // protected $fillable = ['message', 'room'];


    /**
     * Many to One Relationship 
     *
     * @return 
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * Many to One Relationship 
     *
     * @return 
     */
    public function room()
    {
      return $this->belongsTo(Room::class);
    }

}
