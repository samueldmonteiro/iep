<?php

namespace App\Http\Controllers;

use App\Models\Polo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PoloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => 'required',
            'acronym' => 'required',
            'contact' => 'required',
        ]);

       $course = new Polo();
       $course->name = $request->name;
       $course->address = $request->address;
       $course->contact = $request->contact;
       $course->acronym = $request->acronym;
       $course->image = $request->image->store('polos/images');
       $course->slug = Str::slug($request->title);
       $course->save();

       return redirect()->back()->withMessage(['message'=> 'Polo Criado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Polo $polo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polo $polo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Polo $polo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polo $polo)
    {
        //
    }
}
