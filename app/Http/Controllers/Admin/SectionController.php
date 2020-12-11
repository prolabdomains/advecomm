<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Section;

class SectionController extends Controller
{
    public function sections()
    {
        $sections = Section::all();
        Session::put('page', 'sections');
        return view('admin.section.sections', compact('sections'));
    }

    public function updateSectionStatus(Request $request)
    {
        if($request->section_status == 1)
        {
            Section::where('id', $request->section_id)->update(['status'=> 0]);
            return response()->json(['section_status' => 0, 'section_id' => $request->section_id]);
        }

        if($request->section_status == 0)
        {
            Section::where('id', $request->section_id)->update(['status'=> 1]);
            return response()->json(['section_status' => 1, 'section_id' => $request->section_id]);
        }
    }
}
