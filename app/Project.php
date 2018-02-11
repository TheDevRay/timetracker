<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $fillable = ['name', 'user_id'];

    /**
     * {@inheritDoc}
     */
    protected $with = ['user'];

    /**
     * Get the associated user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get associated timers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timers() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Timer::class);
    }

    /**
     * Get my projects
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMine($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereUserId(auth()->user()->id);
    }
}
