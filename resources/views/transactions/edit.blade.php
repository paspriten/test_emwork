@extends('layouts.app')

@section('title', 'Edit Transaction')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Transaction</h1>
    
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Transaction Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $transaction->name }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ $transaction->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="transaction_date" class="form-label">Transaction Date</label>
            <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Transaction</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
