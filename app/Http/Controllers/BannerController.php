<?php

namespace App\Http\Controllers;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }




    public function create()
    {
        return view('admin.banner.create');
    }



    public function store()
    {
        dd(request()->all());
    }



    public function edit()
    {

    }



    public function update()
    {

    }



    public function status()
    {

    }




}
