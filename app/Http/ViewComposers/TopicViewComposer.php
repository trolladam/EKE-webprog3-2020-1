<?php

namespace App\Http\ViewComposers;

use App\Models\Topic;
use Illuminate\View\View;

class TopicViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $topics = Topic::orderBy('title')->get();

        $view->with('navTopics', $topics);
    }
}
