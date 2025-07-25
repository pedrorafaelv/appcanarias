<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Smsnotification;
use Illuminate\Http\Request;

/**
 * Class SmsnotificationController
 * @package App\Http\Controllers
 */
class SmsnotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.smsnotificacion.index')->only('index');
        $this->middleware('can:admin.smsnotificacion.edit')->only('edit', 'update');
        $this->middleware('can:admin.smsnotificacion.create')->only('create', 'store');
        $this->middleware('can:admin.smsnotificacion.show')->only('show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smsnotifications = Smsnotification::paginate();

        return view('admin.smsnotification.index', compact('smsnotifications'))
            ->with('i', (request()->input('page', 1) - 1) * $smsnotifications->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $smsnotification = new Smsnotification();
        return view('admin.smsnotification.create', compact('smsnotification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Smsnotification::$rules);

        $smsnotification = Smsnotification::create($request->all());

        return redirect()->route('smsnotifications.index')
            ->with('success', 'Smsnotification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $smsnotification = Smsnotification::find($id);

        return view('admin.smsnotification.show', compact('smsnotification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $smsnotification = Smsnotification::find($id);

        return view('admin.smsnotification.edit', compact('smsnotification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Smsnotification $smsnotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Smsnotification $smsnotification)
    {
        request()->validate(Smsnotification::$rules);

        $smsnotification->update($request->all());

        return redirect()->route('smsnotifications.index')
            ->with('success', 'Smsnotification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $smsnotification = Smsnotification::find($id)->delete();

        return redirect()->route('smsnotifications.index')
            ->with('success', 'Smsnotification deleted successfully');
    }
}
