<?php

namespace App;
use App\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
	use Authenticatable;

	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'phone',
		'college',
		'department',
		'position',
		'linkedinURL',
		'facebookURL',

	];

    protected $table = 'users';

}
