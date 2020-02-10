<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Masnod extends Authenticatable
{
    use Notifiable;

    public $table = "masnods";

    protected $guard ='masnod';

    public function masnods_helps()
    {
        return $this->hasMany('App\Masnod_help');
    }

    public function vmasnods_helps()
    {
        return $this->hasMany('App\Vmasnod_help');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public function social_id_photo($social_id_front_photo,$social_id_back_photo){
       if(strlen($social_id_back_photo)>0){
         $this->social_id_front_photo = $social_id_front_photo;
         $this->social_id_back_photo = $social_id_back_photo;
       }else{
         strlen($this->social_id_front_photo)>0 ?  $this->social_id_back_photo = $social_id_front_photo : $this->social_id_front_photo = $social_id_front_photo;
       }
       return $this;
     }
    protected $fillable = [
        'name', 'email', 'password','social_id', 'address', 'telephone', 'governorate','lat','lng',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
