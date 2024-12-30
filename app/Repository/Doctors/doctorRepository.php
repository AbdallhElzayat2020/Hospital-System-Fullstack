<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class doctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;
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


        // try {

        //     DB::beginTransaction();

        //     $doctor = new Doctor();

        //     $doctor->name = $request->name;

        //     $doctor->email = $request->email;

        //     $doctor->password = Hash::make($request->password);

        //     $doctor->phone = $request->phone;

        //     $doctor->status = 1;

        //     $doctor->price = $request->price;

        //     $doctor->appointments = implode(',', $request->appointments);

        //     $doctor->section_id = $request->section_id;

        //     $doctor->save();

        //     // upload image

        //     $this->StoreImage($request, 'photo', 'Doctors', 'upload_Image', $doctor->id, Doctor::class);

        //     DB::commit();

        //     session()->flash('add', __('Dashboard/messages.add'));

        //     return redirect()->route('doctors.index');
        // } catch (\Throwable $e) {

        //     DB::rollBack();

        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // 


        // $request->all();
        DB::beginTransaction();

        try {


            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->price = $request->price;
            $doctors->status = 1;
            $doctors->save();
            // store trans
            $doctors->name = $request->name;
            $doctors->appointments = implode(",", $request->appointments);
            $doctors->save();


            //Upload img
            $this->StoreImage($request, 'photo', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

            DB::commit();
            session()->flash('add', __('Dashboard/messages.add'));
            return redirect()->route('doctors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
