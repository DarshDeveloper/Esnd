<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Masnod_request extends Model
{
    use Notifiable;

    public $table = "masnods_request";
    public $timestamps = false;

//    protected $guard ='masnod_help';
    public function masnodshelp()
    {
        return $this->belongsTo('App\Masnod');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'request_description', 'category', 'masnod_status', 'request_status', 'attachments',
    // ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
}
