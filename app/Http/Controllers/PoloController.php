<?php

namespace App\Http\Controllers;

use App\Models\Polo;
use App\Models\CoursePolo;

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

       $polo = new Polo();
       $polo->name = $request->name;
       $polo->address = $request->address;
       $polo->contact = $request->contact;
       $polo->acronym = $request->acronym;
       $polo->image = $request->image->store('polos/images');
       $polo->slug = Str::slug($request->name);
       $polo->save();

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
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'acronym' => 'required',
            'contact' => 'required',
        ]);

        $polo = Polo::where('slug', $slug)->first();
        $polo->name = $request->name;
        $polo->address = $request->address;
        $polo->contact = $request->contact;
        $polo->acronym = $request->acronym;
        $polo->slug = Str::slug($request->name);
        if($request->image){
             $polo->image = $request->image->store('polos/images');
        }
        $polo->save();

       return redirect()->route('admin.showPolo', ['slug'=> $polo->slug])->withMessage(['message'=> 'Polo Criado com Sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $polo = Polo::where('slug', $slug)->first();

        foreach(CoursePolo::where('polo_id', $polo->id)->get() as $coursePolo){
            $coursePolo->delete();
        }
        $polo->delete();
    }
}
