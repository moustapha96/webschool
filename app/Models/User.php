<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable   implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'nom', 'email', 'password','prenom','dateNaissance',
        'lieuNaissance','adresse','role','genre','avatar','status','flag'
    ];

  
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher(){
        return $this->hasOne(Teacher::class, 'user_id');
    }
    public function student(){
        return $this->hasOne(Student::class);
    }
    public function librian(){
        return $this->hasOne(Librian::class);
    }
    public function accountant(){
        return $this->hasOne(Accountant::class);
    }
    public function supervisor(){
        return $this->hasOne(Supervisor::class);
    }

    public function parent(){
        return $this->hasOne(Parents::class);
    }
    
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'users';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
    
}
