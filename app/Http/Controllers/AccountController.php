<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index', ['accounts' => Account::all()]);
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(AccountRequest $request): \Illuminate\Http\RedirectResponse
    {
        Account::create($request->validated());

        return redirect()->route('accounts.index')->with('success', 'Account have been registered');
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', ['account' => $account]);
    }

    public function update(Account $account, AccountRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account->update($request->validated());

        return redirect()->route('accounts.index');
    }

    public function destroy(Account $account): \Illuminate\Http\RedirectResponse
    {
        $account->delete();

        return redirect()->back();
    }
}
