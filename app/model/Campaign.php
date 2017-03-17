<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	use Notifiable;
	
    protected $table = 'campaign';
    
//     protected $title;
    
//     protected $description;
    
//     protected $userId;
    
//     protected $sendType;
    
//     protected $sendApprove;
    
//     protected $templateType;
    
//     protected $mailSubject;
    
//     protected $headerTitle;
    
//     protected $sender;
    
//     protected $sendEmail;
    
//     protected $replyEmail;
    
//     protected $schedule;
    
//     protected $previewMessage;
    
//     protected $contentsTemplate;
    
//     protected $footerBanner;
    
//     protected $imageUrl;
    
//     protected $linkUrl;
    
//     protected $regDate;
    
//     protected $uptDate;
    
    public $timestamps = false;
    
}
