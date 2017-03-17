<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	use Notifiable;
	
    protected $table = 'template';
    
    public $timestamps = false;
    
}
