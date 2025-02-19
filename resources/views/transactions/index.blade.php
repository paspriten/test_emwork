@extends('layouts.app')

@section('title', 'Transaction List')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h2 class="mb-4 text-center fw-bold">
            Transactions for {{ $month ? $month : 'All Months' }}
        </h2>
    </div>

    <form action="{{ route('transactions.index') }}" method="GET">
        <div class="row justify-content-center mb-3">
            <div class="col-md-4">
                <label for="month" class="form-label fw-bold">Select Month</label>
                <select name="month" id="month" class="form-select">
                    <option value="">All Months</option>
                    @foreach(range(1,12) as $m)
                        <option value="{{ now()->year }}-{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}"
                            {{ request('month') == now()->year . '-' . str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                            {{ now()->year }}-{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row text-center mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-success btn-lg mx-2">Filter</button>
                {{-- <a href="{{ route('transactions.report') }}" class="btn btn-info btn-lg mx-2">View Report</a> --}}
                <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-lg mx-2">+ Add New</a>
            </div>
        </div>
    </form>

    <table id="transactionTable" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Type</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Created At</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($transaction->type == 'income')
                        <span class="badge bg-success">รายรับ</span>
                    @else
                        <span class="badge bg-danger">รายจ่าย</span>
                    @endif
                </td>
                <td>{{ $transaction->name }}</td>
                <td>{{ number_format($transaction->amount, 2) }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
