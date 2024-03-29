<?php

namespace App\Services;

use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    public function updateAccount(array $data){
        $user = Auth::user();

        $prepareData = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthday' => $data['birthday'],
            'sex' => $data['sex'],
            'phone' => $data['phone'],
            'description' => $data['description'],
        ];

        if(!$user->information){
            $userInformation = new UserInformation($prepareData);
            $user->information()->save($userInformation);
        } else {
            $user->information()->update($prepareData);
        }
        return $user;
    }
}
