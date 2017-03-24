<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	use Notifiable;
	
    protected $table = 'member';
    
    public $timestamps = false;
    
}
