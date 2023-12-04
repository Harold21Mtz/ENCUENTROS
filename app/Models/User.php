<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'user_profile',
        'user_status',
        'user_image',
        'name',
        'email',
        'password',
        'remember_token',
        'password_created_or_updated_at',
        'email_verified_at',
        'user_session_attempts',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function persona_rel(){
        $pers = Persona::where("user_id","=",$this->id)->get();
        $persona=null;
        foreach($pers as $per){
            $persona=$per;
            return $persona;
        }
        return $persona;
    }
}
