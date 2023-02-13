<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    public function index()
    {
        $no = 1;
        $family = Family::all();

        return view('family.index', compact('family', 'no'));
    }

    public function create()
    {
        $parents = Family::getAllParent();
        return view('family.form', compact('parents'));
    }

    public function edit($id)
    {
        $data = Family::find($id);
        $parents = Family::getAllParent();
        return view('family.form', compact('data', 'parents'));
    }

    public function store(Request $request)
    {
        Family::create(request()->all());
        return redirect(route('family.index'));
    }

    public function update($id, Request $request)
    {
        $data = Family::find($id);
        $data->update(request()->all());
        return redirect(route('family.index'));
    }

    public function destroy($id)
    {
        Family::destroy($id);
        return redirect(route('family.index'));
    }
}
