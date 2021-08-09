<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $2y$10$tOuO48CEd.sSbRtSEOnVfuzczFaCi9Pn50ZBGn2bzZBFl/rNAoFFq
        // satu user banyak status/data
        // User::factory()->has(Status::factory()->count(5))->count(5)->create();

        // cara cepat
        // User::factory()->hasStatuses(5)->count(10)->create();

        // follow
        // $user1 = User::find(1);
        // $user2 = User::find(2);
        // $user1->following()->save($user2);

        \App\Models\Poli::factory()->hasDokters(5)->count(10)->create();
        User::factory()->create();
    }
}
