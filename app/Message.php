<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message is a chat message. Messages are posted in a chat room.
 */
class Message extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param int   $limit
     *
     * @return mixed
     */
    public function scopeLatestByRoom($query, int $limit = 10)
    {
        return $query
            ->with(['user'])
            ->latest()
            ->limit($limit)
            ;
    }
}