<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'fb_link', 'tw_link', 'insta_link', 'youtube_link', 'whatsup_num', 'about_app', 'play_store_url', 'app_store_url', 'notification_settings_text');

}