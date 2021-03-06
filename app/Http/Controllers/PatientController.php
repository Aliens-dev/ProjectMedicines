<?php

namespace App\Http\Controllers;

use App\Models\Desease;
use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Kossa\AlgerianCities\Commune;
use Kossa\AlgerianCities\Wilaya;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $patients = Patient::paginate(20);
        return view('dashboard.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $deseases = Desease::all();
        return view('dashboard.patients.create', compact('deseases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'national_id' => 'required|digits_between:18,18|numeric',
            'birthday'=> 'required|date',
            'age' => 'required|min:1|max:120',
            'state_of_residence' => 'required',
            'city_of_residence' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/0[567]\d{8}/',
            'first_injection_date' => 'required|date|after_or_equal:today',
            'next_appointment' => 'required|date|after:first_injection_date',
            'deseases' => 'sometimes|required',
            'deseases.*' => 'exists:deseases,id'
        ];

        $request->validate($rules);

        $patient = new Patient();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->national_id = $request->national_id;
        $patient->birthday = $request->birthday;
        $patient->age = $request->age;
        $patient->state_of_residence = Wilaya::where('id', $request->state_of_residence)->first()->name;
        $patient->city_of_residence = Commune::where('id', $request->city_of_residence)->first()->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->first_injection_date = $request->first_injection_date;
        $patient->next_appointment = $request->next_appointment;
        $patient->save();

        $patient->deseases()->attach($request->deseases);

        Session::flash('success','un patient est correctement ajout??');
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('dashboard.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $deseases = Desease::all();
        return view('dashboard.patients.edit', compact(['patient','deseases']));
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
        $patient = Patient::findOrFail($id);

        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'national_id' => 'required|digits_between:18,18|numeric',
            'birthday'=> 'required|date',
            'age' => 'required|min:1|max:120',
            'state_of_residence' => 'required',
            'city_of_residence' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/0[567]\d{8}/',
            'first_injection_date' => 'required|date',
            'next_appointment' => 'required|date|after:first_injection_date',
            'deseases' => 'sometimes|required',
            'deseases.*' => 'exists:deseases,id'
        ];

        $request->validate($rules);

        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->national_id = $request->national_id;
        $patient->birthday = $request->birthday;
        $patient->age = $request->age;
        $patient->state_of_residence = Wilaya::where('id', $request->state_of_residence)->first()->name;
        $patient->city_of_residence = Commune::where('id', $request->city_of_residence)->first()->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->first_injection_date = $request->first_injection_date;
        $patient->next_appointment = $request->next_appointment;
        $patient->save();

        $patient->deseases()->sync($request->deseases);

        Session::flash('success','un patient est correctement modif??');

        return redirect()->route('patients.index');
    }


    public function submitInjection($patientId)
    {
        $patient = Patient::findOrFail($patientId);

        $patient->second_injection = 1;
        $patient->save();

        return redirect()->route('patients.show', $patientId)->with('success', 'le patient injection est modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        Session::flash('success','un patient est correctement supprimm??');

        return redirect()->route('patients.index')->with('success', 'user removed');
    }

    public function search()
    {
        $search = request()->input('search');
        $patients = Patient::where('first_name', 'LIKE', '%'.$search.'%')
        ->orWhere('last_name', 'LIKE', '%'.$search.'%')
        ->orWhere('national_id', 'LIKE', '%'.$search.'%')
        ->paginate(20);
        return view('dashboard.patients.index', compact('patients'));
    }
}
