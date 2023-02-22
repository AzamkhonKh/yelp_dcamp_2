<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Tag;
use App\Models\Organisation;
use App\Models\TagOrganisation;
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
        $tags = Tag::factory(10)->create();
        Organisation::factory(100)->create()->each(function (Organisation $o) use ($tags){
            $o->comments()->saveMany(Comments::factory(10)->make());
            $count = rand(1, 10);
            $tags->take($count)
                ->map(fn (Tag $t) => TagOrganisation::create(['tag_id' => $t->id, 'organisation_id' => $o->id]));

        });
    }
}
