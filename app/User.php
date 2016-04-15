<?php

namespace App;
use App\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract
{
	use Authenticatable;
	protected $fillable = ['id'];
    protected $table = 'users';

    public function college(){
		return $this->belongsTo('App\College')->select('id', 'name');
	}
}
