<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $query = Transaction::where('user_id', auth()->id());
    
        if ($request->filled('month')) {
            $date = \Carbon\Carbon::createFromFormat('Y-m', $request->month);
            $query->whereYear('transaction_date', $date->year)
                  ->whereMonth('transaction_date', $date->month);
        }
    
        $transactions = $query->orderBy('created_at', 'desc')->get();
    
        return view('transactions.index', [
            'transactions' => $transactions,
            'month' => $request->month ?? null
        ]);
    }
    


    public function create()
    {
        return view('transactions.create');
    }

    public function store(TransactionRequest $request)
    {
        if (!auth()->check()) {
            abort(403, 'User is not authenticated');
        }
    
        \Log::info('Transaction Request Data:', $request->all());
    
        Auth::user()->transactions()->create($request->validated());
    
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }
    

    public function edit(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('transactions.edit', compact('transaction'));
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $transaction->update($request->validated());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function trashed()
    {
        $transactions = Auth::user()->transactions()->onlyTrashed()->get();
        return view('transactions.trashed', compact('transactions'));
    }

    public function restore($id)
    {
        $transaction = Auth::user()->transactions()->onlyTrashed()->findOrFail($id);
        $transaction->restore();

        return redirect()->route('transactions.index')->with('success', 'Transaction restored successfully.');
    }

    public function report(Request $request)
    {
        $month = $request->query('month', now()->format('Y-m'));
    
        $transactions = Auth::user()->transactions()
            ->where('transaction_date', 'like', "$month%")
            ->orderBy('transaction_date', 'asc')
            ->get();
    
        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');
        $balance = $income - $expense;
    
        return view('transactions.report', compact('month', 'transactions', 'income', 'expense', 'balance'));
    }
    
}
