<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Article;

class ArticleComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latest_articles', App\Article::all());
    }
}