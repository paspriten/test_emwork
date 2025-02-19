<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            for ($i = 0; $i < 20; $i++) {
                Transaction::create([
                    'user_id' => $user->id,
                    'type' => rand(0, 1) ? 'income' : 'expense',
                    'name' => 'Transaction ' . ($i + 1),
                    'amount' => rand(100, 5000) / 100,
                    'transaction_date' => now()->subDays(rand(0, 60))->format('Y-m-d'),
                ]);
            }
        }
    }
}
