<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function update_avatar($avatar)
    {
        
            $filename = $avatar->getClientOriginalName();
            (new self())->deleteoldimage();
            $avatar->storeAs('images',$filename, 'public');
            auth()->user()->update(['avatar'=>$filename]);
        }
    protected function deleteoldimage(){
        if($this->avatar){
            Storage::delete('/public/images' . $this->avatar);
        }
        
    }
}
