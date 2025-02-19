@extends('layouts.app')

@section('title', 'Transaction Report')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">รายงานรายรับ-รายจ่าย ประจำเดือน {{ $month }}</h2>


    <!-- Dropdown เลือกเดือน -->
    <form method="GET" action="{{ route('transactions.report') }}" class="mb-3">
        <label for="month" class="form-label">เลือกเดือน:</label>
        <input type="month" name="month" id="month" value="{{ $month }}" class="form-control w-auto d-inline">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
    </form>

    <div class="card p-3 mb-4">
        <h4>สรุปยอด:</h4>
        <ul class="list-group">
            <li class="list-group-item">รายรับ: <strong class="text-success">{{ number_format($income, 2) }}</strong> บาท</li>
            <li class="list-group-item">รายจ่าย: <strong class="text-danger">{{ number_format($expense, 2) }}</strong> บาท</li>
            <li class="list-group-item">ยอดคงเหลือ: <strong class="{{ $balance >= 0 ? 'text-success' : 'text-danger' }}">{{ number_format($balance, 2) }}</strong> บาท</li>
        </ul>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>วันที่</th>
                <th>ประเภท</th>
                <th>ชื่อรายการ</th>
                <th>จำนวนเงิน</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td class="{{ $transaction->type == 'income' ? 'text-success' : 'text-danger' }}">
                        {{ $transaction->type == 'income' ? 'รายรับ' : 'รายจ่าย' }}
                    </td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ number_format($transaction->amount, 2) }} บาท</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">ไม่มีข้อมูลในเดือนนี้</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
