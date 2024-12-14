<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $section;

    public function __construct(SectionRepositoryInterface $section)
    {
        $this->section = $section;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->section->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->section->store($request);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->section->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->section->destroy($request);
    }
}
