<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Http\Requests\ContactFormRequest;

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
        if (!\Auth::guest()) {
            \Auth::user()->store->load(['rentals', 'rentals.payments', 'customers', 'inventories', 'films']);
        }
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

    /**
     * send email Contact page
     *
     * @return [type]
     */
    public function store($locale, ContactFormRequest $request)
    {
        
        \Mail::send('mail', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ], function ($message) {
                $message->from('agrodriguez@cordoba.gob.mx');
                $message->to('agrodriguez@cordoba.gob.mx', 'Admin')->subject('Contacto Sakila V2');
            });
        
        flash(trans('messages.store', ['name' => trans('contact.contact')]), 'success');
        return redirect(\App::getLocale().'/contact');
    }
}
