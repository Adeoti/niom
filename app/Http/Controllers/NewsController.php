<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Fetch news articles from the database
        $news = \App\Models\News::latest()->paginate(10);

        // Return the news index view with the news articles
        return view('front.news.index', compact('news'));
    }

    public function show($id)
    {
        // Fetch the news article by its ID
        $news = \App\Models\News::findOrFail($id);
        $recentNews = \App\Models\News::where('id', '!=', $id)->latest()->take(5)->get();
        // Return the news show view with the news article
        return view('front.news.single', compact('news', 'recentNews'));
    }
}
