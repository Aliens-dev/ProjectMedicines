<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('dashboard.patients.create');
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
            'national_id' => 'required',
            'birthday'=> 'required|date',
            'age' => 'required|min:1|max:120',
            'state_of_residence' => 'required',
            'city_of_residence' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'first_injection_date' => 'required|date',
            'next_appointment' => 'required|date',
        ];

        $request->validate($rules);

        $patient = new Patient();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->national_id = $request->national_id;
        $patient->birthday = $request->birthday;
        $patient->age = $request->age;
        $patient->state_of_residence = $request->state_of_residence;
        $patient->city_of_residence = $request->city_of_residence;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->first_injection_date = $request->first_injection_date;
        $patient->next_appointment = $request->next_appointment;
        $patient->save();
        Session::flash('success','un patient est correctement ajouté');
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
        return view('dashboard.patient.show', compact('patient'));
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
        return view('dashboard.patients.edit', compact('patient'));
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
            'national_id' => 'required',
            'birthday'=> 'required|date',
            'age' => 'required|min:1|max:120',
            'state_of_residence' => 'required',
            'city_of_residence' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'first_injection_date' => 'required|date',
            'next_appointment' => 'required|date',
        ];

        $request->validate($rules);

        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->national_id = $request->national_id;
        $patient->birthday = $request->birthday;
        $patient->age = $request->age;
        $patient->state_of_residence = $request->state_of_residence;
        $patient->city_of_residence = $request->city_of_residence;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->first_injection_date = $request->first_injection_date;
        $patient->next_appointment = $request->next_appointment;
        $patient->save();

        Session::flash('success','un patient est correctement modifé');

        return redirect()->route('patients.index');
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
        Session::flash('success','un patient est correctement supprimmé');

        return redirect()->route('patients.index');
    }
}
