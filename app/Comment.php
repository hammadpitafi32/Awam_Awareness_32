<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Comment extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'comment', 'post_id','user_id'];

    public function posts()
    {
        return $this->hasMany('Comments');
    }
    public function user()
    {
         return $this->BelongsTo('App\User','user_id','id');
    }
    public function likes()
    {
         return $this->hasMany('App\Like');
    }
    public function Dislikes()
    {
         return $this->hasMany('App\Dislike');
    }
    public function CurrentUserlikes()
    {
         return $this->hasMany('App\Like')->whereUserId(Auth::user()->id);
    }
    public function CurrentUserDislikes()
    {
         return $this->hasMany('App\Dislike')->whereUserId(Auth::user()->id);
    }
    
}
