<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Organisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organisation::factory(10)->create()->each(function (Organisation $o){
            $o->comments()->saveMany(Comments::factory(10)->make());
        });
    }
}
