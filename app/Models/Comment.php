<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'user_id', 'post_id'];
	
	/**
     * Save new Comment
     *
     * @param array $data
	 * @return object Comment
     */
	public function saveComment($data)
	{
		return $this->create($data);
	}
	
	/**
     * Update Comment
     *
     * @param array $data
	 * @return void
     */
	public function updateComment($data)
	{
		$this->update($data);
	}	
	
	/**
     * Return the user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	/**
     * Return the post relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function post()
	{
		return $this->belongsTo('App\Models\Post');
	}
}