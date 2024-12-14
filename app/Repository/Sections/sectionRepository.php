<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class sectionRepository implements SectionRepositoryInterface
{


    // Get All Sections
    public function index()
    {
        $sections = Section::paginate(10);
        return view('Dashboard.Sections.index', compact('sections'));
    }

    // Create New Section
    public function create()
    {
        return view('Dashboard.Sections.create');
    }

    public function store($request)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update($request)
    {
        //
    }

    public function destroy($request)
    {
        //
    }
}
