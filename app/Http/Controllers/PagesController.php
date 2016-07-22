<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * index,home page
     *
     * @return view
     */
    public function index($locale)
    {
        \App::setLocale($locale);
        return view('pages.home')->with('name', 'Sakila');
    }

    /**
     * About page
     *
     * @return view
     */
    public function about($locale)
    {
        return view('pages.about');
    }

    /**
     * Contact page
     *
     * @return [type]
     */
    public function contact($locale)
    {
        return view('pages.contact');
    }
}
