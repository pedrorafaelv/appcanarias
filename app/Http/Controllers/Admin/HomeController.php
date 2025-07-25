<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('can:admin.dashboard');
    }
    
    public function index(){
        $anuncios_vencen = Anuncio::vence_en_15();
        $anuncios_a_verificar = Anuncio::a_verificar();
        $usuarios_a_verificar = User::where('verificado', 'No')->get();
        return view('admin.home.index', compact('anuncios_a_verificar', 'anuncios_vencen', 'usuarios_a_verificar'));
        
    }
}
