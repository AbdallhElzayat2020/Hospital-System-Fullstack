<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;

class doctorRepository implements DoctorRepositoryInterface
{

    public function index()
    {
        $doctors = Doctor::all();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        // return "test";
        return view('Dashboard.Doctors.create', compact('sections'));
    }

    public function store($request)
    {
        // $doctor = new Doctor();
        // $doctor->name = $request->name;
        // $doctor->email = $request->email;
        // $doctor->password = $request->password;
        // $doctor->phone = $request->phone;
        // $doctor->price = $request->price;
        // $doctor->appointments = $request->appointments;
        // $doctor->section_id = $request->section_id;
        // $doctor->save();
        // session()->flash('add', __('Dashboard/messages.add'));
        // return redirect()->route('doctors.index');

    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('Dashboard.Doctors.edit', compact('doctor'));
    }

    public function update($request)
    {
        $id = $request->id;
        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->password = $request->password;
        $doctor->phone = $request->phone;
        $doctor->price = $request->price;
        $doctor->appointments = $request->appointments;
        $doctor->section_id = $request->section_id;
        $doctor->save();

        // return response()->json([
        //     'status' => true,
        //     'msg' => 'Doctor Updated Successfully',
        // ]);
        session()->flash('add', __('Dashboard/messages.add'));
        return redirect()->route('doctors.index');
    }

    public function destroy($request)
    {
        $id = $request->id;
        Doctor::findOrFail($id)->delete();
        session()->flash('delete', __('Dashboard/messages.delete'));
        return redirect()->route('doctors.index');
    }
}
