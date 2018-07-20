<?php
/**
 * Created by PhpStorm.
 * User: igetweb
 * Date: 05-Jul-18
 * Time: 15:35
 */

namespace App\Steps;


class SetUserNameStep extends \Smajti1\Laravel\Step
{
    public static $label = 'Set user name';
    public static $slug = 'set-user-name';
    public static $view = 'wizard.user.steps._set_user_name';

    public function process(\Illuminate\Http\Request $request)
    {
        // for example, create user
        //...
        // next if you want save one step progress to session use
        $this->saveProgress($request);
    }

    public function rules(\Illuminate\Http\Request $request = null): array
    {
        return [
            'username' => 'required|min:4|max:255',
        ];
    }
}