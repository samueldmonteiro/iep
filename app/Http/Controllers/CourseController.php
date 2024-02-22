<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Polo;
use App\Models\CoursePolo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
        $courses = Course::all();
        if($r->polo){
            if(Polo::where('name', $r->polo)->first()){
                $courses = Polo::where('name', $r->polo)->first()->courses;
            }
        }
        return view('front.courses.index', [
            'courses' => $courses,
            'polos' => Polo::all(),
            'p_value' => $r->polo
        ]);
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
            'title' => 'required',
            'mini_desc' => 'required',
            'description' => 'required',
            'image' => 'required',
            'polos' => 'required',
        ]);

       $course = new Course();
       $course->title = $request->title;
       $course->mini_description = $request->mini_desc;
       $course->description = $request->description;
       $course->image = $request->image->store('courses/images');
       $course->slug = Str::slug($request->title);
       $course->save();

       foreach($request->polos as $poloId){
            $coursePolo = new CoursePolo();
            $coursePolo->course_id = $course->id;
            $coursePolo->polo_id = $poloId;
            $coursePolo->registration_price = 49.99;
            $coursePolo->available = 1;
            $coursePolo->save();
       }
       return redirect()->back()->withMessage(['message'=> 'Curso Criado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $r)
    {
        $course = Course::where('slug', $r->course)->first();
        if(!$course){
            return redirect()->route('front.index');
        }

        return view('front.courses.show', [
            'course' => $course,
            'polos' => $course->polos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
