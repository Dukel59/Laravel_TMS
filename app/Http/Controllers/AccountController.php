<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account(){
        return view('auth.account', [
            'user' => Auth::user()
        ]);
    }

    public function updateAccount(AccountRequest $request, AccountService $accountService){
        $accountService->updateAccount($request->all());
        return redirect()->route('account.show');
    }
}
