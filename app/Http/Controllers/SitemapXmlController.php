<?php

namespace App\Http\Controllers;

use App\Models\Portifolio;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index() {
        $posts = Portifolio::all();
        return response()->view('index', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
      }
}
