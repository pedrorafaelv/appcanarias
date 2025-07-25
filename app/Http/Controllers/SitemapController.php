<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Provincia;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $provincias = Provincia::all();
        $anuncios = Anuncio::whereIn('estado', ['Publicado'])->latest()->get();

        return response()->view('sitemap',compact('anuncios', 'categorias', 'provincias'))->header('Content-Type', 'text/xml');
    }
}
