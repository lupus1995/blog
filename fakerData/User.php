<?php

namespace app\fakerData;

use app\models\UserIdentity as ModelsUser;

class User
{
    public function generatedUser()
    {
        $user = new ModelsUser();
        $user->firstName = 'admin';
        $user->lastName = 'admin';
        $user->username = 'admin';
        $user->password = 'admin';
        $user->save();
        var_dump($user->validate());
        var_dump($user);
        var_dump($user->publicAuthKey);
        var_dump($user->publicPassword);
    }
}
