<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email', 'password', 'confirmpassword', 'status', 'role'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    

    //     public function hasAnyRole($roles)
    //     {
    //         if(is_array($roles)){
    //             foreach ($roles as $role) {
    //                 if($this->hasRole($role)){
    //                     return true;
    //                 }
    //             }
    //         }
    //         else{
    //             if($this->hasRole($role)){
    //                     return true;
    //         }
    //     }
    // }

    //      public function hasRole($role)
    //      {
    //         if($this->roles()->where('name',$role)->first()){
    //             return true;
    //         }
    //         return false;
    //      }
    public function hasAnyRoles($roles)
{
return null !== $this->roles()->whereIn('name',$roles)->first();
}

public function hasAnyRole($role)
{
return null !== $this->roles()->where('name',$role)->first();
}
    
}
