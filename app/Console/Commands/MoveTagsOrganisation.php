<?php

namespace App\Console\Commands;

use App\Models\Tag;
use App\Models\TagOrganisation;
use Illuminate\Console\Command;

class MoveTagsOrganisation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:tags-organisation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->move_tag_organisation();
        $dublicate_tags = Tag::select('name')
            ->groupBy('name')
            ->having(\DB::raw('count(name)'), '>', 1)
            ->pluck('name');
        foreach($dublicate_tags as $t)
        {
            $cases = Tag::where('name', $t)->get()->pluck('id')->toArray();
            $unique_id = next($cases);
            foreach($cases as $c)
            {
                TagOrganisation::where('tag_id', $c)->update([
                    'tag_id' => $unique_id
                ]);
                Tag::find($c)->delete();
            }
        }
        return Command::SUCCESS;
    }

    public function move_tag_organisation()
    {
        $tags = Tag::all();
        foreach($tags as $t){
            TagOrganisation::create([
                'organisation_id' => $t->organisation_id,
                'tag_id' => $t->id
            ]);
        }
    }
}
