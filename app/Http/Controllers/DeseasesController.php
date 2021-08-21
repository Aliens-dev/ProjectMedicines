<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desease;

class DeseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deseases = Desease::orderBy('name', 'asc')->paginate(20);
        return view('dashboard.deseases.index')->with('deseases', $deseases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.deseases.createDesease');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        return redirect('/deseases')->with('success','Desease created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desease = Desease::find($id);
        return view('dashboard.deseases.showDesease')->with("desease", $desease);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desease = Desease::find($id);
        return view('dashboard.deseases.editDesease')->with("desease", $desease);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $desease = Desease::find($id);
        $desease->name = $request->input('name');
        $desease->description = $request->input('description');
        $desease->save();

        return redirect('/deseases')->with('success','Desease updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desease = Desease::find($id);
        $desease->delete();
        return redirect('/deseases')->with('success', 'Desease removed');
    }
}
