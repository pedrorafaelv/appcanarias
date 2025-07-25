<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use App\Models\Provincia;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMuniRequest;
use App\Models\Isla;

/**
 * Class MunicipioController
 * @package App\Http\Controllers
 */
class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.municipios.index')->only('index');
        $this->middleware('can:admin.municipios.edit')->only('edit', 'update');
        $this->middleware('can:admin.municipios.create')->only('create', 'store');
        $this->middleware('can:admin.municipios.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::all();

        return view('admin.municipio.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio = new Municipio();
        $provincias = Provincia::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $islas = Isla::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        return view('admin.municipio.create', compact('municipio', 'provincias', 'islas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Municipio::$rules);

        $municipio = Municipio::create($request->all());

        return redirect()->route('municipios.index')
            ->with('success', 'Municipio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
       // $municipio = Municipio::find($id);

        return view('admin.municipio.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        // $municipio = Municipio::find($id);
        $provincias = Provincia::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $islas = Isla::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        return view('admin.municipio.edit', compact('municipio', 'provincias', 'islas'));
    }

   
    public function update(UpdateMuniRequest $request, Municipio $municipio)
    {
        // request()->validate([
        // ]); 

        $municipio->update($request->all());

        return redirect()->route('municipios.index')
            ->with('success', 'Municipio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();

        return redirect()->route('municipios.index')
            ->with('success', 'Municipio deleted successfully');
    }
}
