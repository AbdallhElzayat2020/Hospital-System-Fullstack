<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use App\Models\User;

class sectionRepository implements SectionRepositoryInterface
{

    // Get All Sections
    public function index()
    {
        $sections = Section::paginate(10);
        return view('Dashboard.Sections.index', compact('sections'));
    }
    // insert function
    public function store($request)
    {
        Section::create([
            'name' => $request->name,
        ]);

        session()->flash('add', __('Dashboard/messages.add'));
        return redirect()->route('sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit', __('Dashboard/messages.edit'));
        return redirect()->route('sections.index');
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete', __('Dashboard/messages.delete'));
        return redirect()->route('sections.index');
    }
}
