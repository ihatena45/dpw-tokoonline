<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('buyer_id', Auth::id())
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }

    public function store(Request $request)
    {
        Transaction::create($request->all());

        return redirect()->route('transactions.index');
    }
}