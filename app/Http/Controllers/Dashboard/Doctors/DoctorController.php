<?php

namespace App\Http\Controllers\Dashboard\Doctors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctors\DoctorRequest;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{



    protected $doctor;

    public function __construct(DoctorRepositoryInterface $doctor)
    {
        $this->doctor = $doctor;
    }

    public function index()
    {
        return $this->doctor->index();
    }

    public function create()
    {
        return $this->doctor->create();
    }

    // public function store(DoctorRequest $request)
    public function store(Request $request)
    {
        return $this->doctor->store($request);
    }

    public function edit($id)
    {
        return $this->doctor->edit($id);
    }

    public function update(Request $request)
    {
        return $this->doctor->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }
}
