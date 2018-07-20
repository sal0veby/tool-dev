<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginModel extends Model
{
    protected $table = 'user_logins';
    protected $table_account = 'user_accounts';
    protected $primaryKey = 'id';


    protected $fillable = [
        'first_name',
        'last_name',
        'user_permission',
        'active',
        'tel'
    ];

    public function accounts()
    {
        return $this->hasMany('App\Models\AccountModel', 'user_id');
    }

    public function getUserLogin($input)
    {
        $user_login = DB::table($this->table)->where(['username' => $input['username'], 'active' => true])->get();
        if ($user_login) {
            foreach ($user_login as $val) {
                if (object_get($val, 'password') == md5($input['password'])) {
                    $user_account = DB::table($this->table_account)->where(['user_id' => object_get($val, 'id'), 'active' => true])->first();
                    session([
                        'id' => object_get($val, 'id'),
                        'username' => object_get($val, 'username'),
                        'first_name' => object_get($user_account, 'first_name'),
                        'last_name' => object_get($user_account, 'last_name'),
                        'full_name' => object_get($user_account, 'first_name') . ' ' . object_get($user_account, 'last_name'),
                        'email' => object_get($val, 'email')
                    ]);
                    return true;
                } else {
                    return false;
                }
            }

        } else {
            return false;
        }
    }


}

