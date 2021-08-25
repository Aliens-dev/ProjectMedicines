<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Desease;

class DeseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $deseases = Desease::orderBy('name', 'asc')->paginate(10);
        return view('dashboard.deseases.index')->with('deseases', $deseases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('dashboard.deseases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $desease = new Desease;
        $desease->name = $request->input('name');
        $desease->description = $request->input('description');
        $desease->save();

        return redirect()->route('deseases.index')->with('success','Desease created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $desease = Desease::findOrFail($id);
        return view('dashboard.deseases.show')->with("desease", $desease);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $desease = Desease::find($id);
        return view('dashboard.deseases.edit')->with("desease", $desease);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $desease = Desease::findOrFail($id);
        $desease->name = $request->input('name');
        $desease->description = $request->input('description');
        $desease->save();

        return redirect()->route('deseases.index')->with('success','Desease updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $desease = Desease::findOrFail($id);
        $desease->delete();
        return redirect()->route('deseases.index')->with('success', 'Desease removed');
    }
}
