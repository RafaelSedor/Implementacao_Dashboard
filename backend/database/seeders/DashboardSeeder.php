<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardSeeder extends Seeder
{
    public function run()
    {
        DB::table('dashboard')->insert([
            'totalUsers' => 100000,
            'activeUsers' => 50000,
            'recentActivity' => json_encode([
                ['id' => 1, 'description' => 'User A logged in'],
                ['id' => 2, 'description' => 'User B signed up'],
                ['id' => 3, 'description' => 'User C updated profile'],
            ]),
            'downloads' => json_encode([
                'totalDownloads' => 100000,
                'totalIOS' => 50000,
                'totalAndroid' => 50000,
                'conversionRate' => '100%',
                'iOSAccess' => 100000,
                'googleAccess' => 100000,
            ]),
            'access' => json_encode([
                'totalAccess' => 100000,
                'url' => 'palinha.com.br',
            ]),
            'metrics' => json_encode([
                'clients' => 100000,
                'activeServices' => 100000,
                'contracts' => 100000,
                'contractsGrowth' => '+25%',
                'activeContracts' => 25000,
            ]),
            'transactions' => json_encode([
                'totalTransactions' => 50000,
                'totalRevenue' => '$441,000',
                'clientCost' => '-5%',
                'legalCost' => '-6%',
            ]),
        ]);
    }
}
