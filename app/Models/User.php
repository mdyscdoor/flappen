<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'type',
        'profile',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function followers() {
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'following_id');
    }

    public function follows() {
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');
    }




    public function getOtherUsers(int $user_id) {
        return $this->Where('id', '<>', $user_id)->simplePaginate(5);
    }

    public function getUser(string $user_name) {
        return $this->Where('name', $user_name)->first();
    }

    public function getFollowingUsers(int $user_id) {
        return $this->follows()->orWhere('follows.following_id', $user_id)->simplePaginate(5);


        // // return DB::select('select * from users join follows on users.id = follows.followed_id where follows.following_id 
        //                       'select * from `users` inner join `follows` on `users`.`id` = `follows`.`followed_id` where `follows`.`following_id` is null or `following_id` = ?'
    }


    public function getFollowedUsers (int $user_id) {
        return $this->followers()->orWhere('follows.followed_id', $user_id)->simplePaginate(5);
    }



    public function howManyFollowings(int $user_id) {
        return $this->follows()->orWhere('follows.following_id', $user_id)->count();
    }

    public function howManyFollowers(int $user_id) {
        return $this->follows()->orWhere('follows.followed_id', $user_id)->count();
    }


    public function follow(int $user_id) {
        return $this->follows()->attach($user_id);

    }


    public function unfollow(int $user_id) {
        return $this->follows()->detach($user_id);
    }


    public function isFollowing(int $user_id) {
        return (boolean) $this->follows()->Where('followed_id', $user_id)->first();
    }

    public function isFollowed(int $user_id) {
        return (boolean) $this->follows()->Where('following_id', $user_id)->first();
    }





    
}
