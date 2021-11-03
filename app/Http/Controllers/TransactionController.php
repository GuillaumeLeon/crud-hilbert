<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transactions.index', ['transactions' => Transaction::all()]);
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(TransactionRequest $request): \Illuminate\Http\RedirectResponse
    {
        Transaction::create($request->validated());

        return redirect()->route('transactions.index')->with('success', 'Transaction have been registered');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', ['transaction' => $transaction]);
    }

    public function update(Transaction $transaction, TransactionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $transaction->update($request->validated());

        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction): \Illuminate\Http\RedirectResponse
    {
        $transaction->delete();

        return redirect()->back();
    }
}
