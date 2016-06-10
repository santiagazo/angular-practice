<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Auth;

class Document extends Model implements HasMedia
{
    use HasMediaTrait;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'priority_id',
        'title',
        'slug',
        'collection',
        'description',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function priority()
    {
    	return $this->belongsTo('App\Priority');
    }

    public function isShared()
    {
        return $this->belongsToMany('App\User')->where('document_user.user_id', Auth::id());
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
