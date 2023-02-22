<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Tag;
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
        Organisation::factory(100)->create()->each(function (Organisation $o){
            $o->comments()->saveMany(Comments::factory(10)->make());
            $o->tags()->saveMany(Tag::factory(10)->make());
        });
    }
}
