<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vmasnod_request extends Model
{
    use Notifiable;
    public $table = "vmasnods_request";
    public $timestamps = false;

    protected $guard ='vmasnod_request';

    public function masnods()
    {
        return $this->belongsTo('App\Masnod');
    }

    public function vmasnods()
    {
        return $this->belongsTo('App\Vmasnod');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'request_description', 'masnod_status', 'request_status', 'request_date', 'value', 'pickup_method', 'critical', 'attachments','c_value',
    ];
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
