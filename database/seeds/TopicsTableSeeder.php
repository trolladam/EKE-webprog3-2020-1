<?php

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topic = new Topic;
        $topic->title = "Food";
        $topic->save();

        $topic = new Topic;
        $topic->title = "Travel";
        $topic->save();

        $topic = new Topic;
        $topic->title = "Gaming";
        $topic->save();

        $topic = new Topic;
        $topic->title = "Pets";
        $topic->save();
    }
}
