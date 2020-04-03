<?php

use App\Guest;
use App\Hotel;
use App\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'failed_jobs',
            'ledgers',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);

        Model::reguard();

        // Guest Seeder
        factory(Guest::class, 10)->create();
        // Hotel Seeder
        factory(Hotel::class, 10)->create();
        // Room Seeder
        factory(Room::class, 10)->create();
    }
}
