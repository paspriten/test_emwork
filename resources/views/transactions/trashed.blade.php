@extends('layouts.app')

@section('title', 'Deleted Transactions')

@section('content')
<div class="container">
    <h2 class="mb-4">Deleted Transactions</h2>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary mb-3">Back to Transactions</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Restore</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ ucfirst($transaction->type) }}</td>
                <td>{{ $transaction->name }}</td>
                <td>{{ number_format($transaction->amount, 2) }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>
                    <form action="{{ route('transactions.restore', $transaction->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
