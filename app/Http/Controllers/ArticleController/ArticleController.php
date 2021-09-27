<?php

namespace App\Http\Controllers\ArticleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function show()
    {
        return "show";
    }

    public function store()
    {
        return "stroe";
    }

    public function update()
    {
        return "update";
    }

    public function destory()
    {
        return "destory";
    }
}
