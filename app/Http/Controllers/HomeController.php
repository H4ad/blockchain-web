<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests\StoreContacts;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.master');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContacts $request)
    {
        Contacts::create($request->validated());

        return view('home.success_contact');
    }
}
