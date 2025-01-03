<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class doctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;
    public function index()
    {
        $doctors = Doctor::with(['section'])->get();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('Dashboard.Doctors.create', compact('sections', 'appointments'));
    }

    public function store($request)
    {
        //


        //dd($request->file('photo'));
        DB::beginTransaction();

        try {

            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            $doctors->save();
            // store trans
            $doctors->name = $request->name;
            $doctors->appointments = implode(",", $request->appointments);
            $doctors->save();

            //Upload img
            if ($request->hasFile('photo')) {
                $doctors->photo = $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctors->id, Doctor::class);
            }
            // $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_Image', $doctors->id, Doctor::class);

            DB::commit();

            session()->flash('add', __('Dashboard/messages.add'));
            return redirect()->route('doctors.create');
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
        // $id = $request->id;
        // $doctor = Doctor::findOrFail($id);
        // $doctor->name = $request->name;
        // $doctor->email = $request->email;
        // $doctor->password = $request->password;
        // $doctor->phone = $request->phone;
        // $doctor->price = $request->price;
        // $doctor->appointments = $request->appointments;
        // $doctor->section_id = $request->section_id;
        // $doctor->save();

        // return response()->json([
        //     'status' => true,
        //     'msg' => 'Doctor Updated Successfully',
        // ]);
        session()->flash('edit', __('Dashboard/messages.edit'));
        return redirect()->route('doctors.index');
    }

    public function destroy($request)
    {
        if ($request->page_id == 1) {

            // check if doctor has image
            if ($request->filename) {
                // use trait for delete File
                $this->Delete_attachment(
                    'upload_image',
                    'doctors/' . $request->filename,
                    $request->id,
                    $request->filename
                );
            }
            // any way to delete doctor if has img or not
            Doctor::destroy($request->id);
            // flash message
            session()->flash('delete', __('Dashboard/messages.delete'));

            return redirect()->route('doctors.index');
        }
        //------------------
        else {

            $delete_select_id = explode(',', $request->delete_select_id);



            foreach ($delete_select_id as $doctor_ids) {
                //
                $doctor = Doctor::findOrFail($doctor_ids);

                // check if doctor has image
                if ($doctor->image) {

                    // use trait for delete File

                    $this->Delete_attachment(
                        'upload_image',
                        'doctors/' . $doctor->image->filename,
                        $doctor->id,
                        $doctor->image->filename
                    );
                }
                Doctor::destroy($doctor_ids);

                session()->flash('delete', __('Dashboard/messages.delete'));
                return redirect()->route('doctors.index');
            }
        }
    }
}
