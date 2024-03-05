<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Polo;
use App\Models\CoursePolo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Vite;


class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
        $head = $this->optimizer->optimize(
            'Cursos - Instituto Educacional Profissionalizante (IEP)',
            'IEP, A maior escola técnica da baixada Maranhense',
            route('courses.index'),
            Vite::asset('resources/images/logo.jpg')
        )->render();

        $courses = Course::all();
        if($r->polo){
            if(Polo::where('name', $r->polo)->first()){
                $courses = Polo::where('name', $r->polo)->first()->courses;
            }
        }
        return view('front.courses.index', [
            'head' => $head,
            'courses' => $courses,
            'polos' => Polo::orderByDesc('id')->get(),
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
        $polos = null;
        $data = $request->all();
        foreach(array_keys($data) as $key){
            if(str_contains($key, 'polo')){
                $polos[explode('_', $key)[1]] =  $data[$key];
            }
        }

        $checkContainPolo = false;
        foreach($polos as $polo){
            if(is_numeric($polo)){
                $checkContainPolo = true;
                break;
            }
        }

        if(!$checkContainPolo){
            return redirect()->back()->withErrors(['error'=> "Polo nao encontrado!"]);
        }

        $request->validate([
            'title' => 'required',
            'mini_desc' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

       $course = new Course();
       $course->title = $request->title;
       $course->mini_description = $request->mini_desc;
       $course->description = $request->description;
       $course->image = $request->image->store('courses/images');
       $course->slug = Str::slug($request->title);
       $course->save();

       foreach(array_keys($polos) as $poloId){
            if($polos[$poloId] && is_numeric($polos[$poloId])){
                $coursePolo = new CoursePolo();
                $coursePolo->course_id = $course->id;
                $coursePolo->polo_id = $poloId;
                $coursePolo->registration_price = $polos[$poloId];
                $coursePolo->available = 1;
                $coursePolo->save();
            }
       }

       return redirect()->back()->withMessage(['message'=> 'Curso Criado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $r)
    {
        $course = Course::where('slug', $r->course)->first();

        $head = $this->optimizer->optimize(
            $course->title . " - Instituto Educacional Profissionalizante (IEP)",
            'IEP, A maior escola técnica da baixada Maranhense',
            route('courses.show', ['course'=> $r->course]),
            Vite::asset('resources/images/logo.jpg')
        )->render();

        $course = Course::where('slug', $r->course)->first();
        if(!$course){
            return redirect()->route('front.index');
        }

        return view('front.courses.show', [
            'head' => $head,
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
    public function update(Request $request, $slug)
    {
        $polos = null;
        $data = $request->all();
        foreach(array_keys($data) as $key){
            if(str_contains($key, 'polo')){
                $polos[explode('_', $key)[1]] =  $data[$key];
            }
        }

        $checkContainPolo = false;
        foreach($polos as $polo){
            if(is_numeric($polo)){
                $checkContainPolo = true;
                break;
            }
        }

        if(!$checkContainPolo){
            return redirect()->back()->withErrors(['error'=> "Polo nao encontrado!"]);
        }

        $request->validate([
            'title' => 'required',
            'mini_desc' => 'required',
            'description' => 'required',
        ]);

        $course = Course::where("slug", $slug)->first();
        $course->title = $request->title;
        $course->mini_description = $request->mini_desc;
        $course->description = $request->description;
        $course->slug = Str::slug($request->title);
        if($request->image){
            $course->image = $request->image->store('courses/images');
        }
        $course->save();

        foreach(array_keys($polos) as $poloId){
            if(CoursePolo::where('course_id', $course->id)->where('polo_id', $poloId)->first()){

                if(is_numeric($polos[$poloId])){
                    $updated = CoursePolo::where('course_id', $course->id)->where('polo_id', $poloId)->first();
                    $updated->registration_price = $polos[$poloId];
                    $updated->save();
                }else{
                    CoursePolo::where('course_id', $course->id)->where('polo_id', $poloId)->first()->delete();
                }
            }else{

                if(is_numeric($polos[$poloId])){
                    $coursePolo = new CoursePolo();
                    $coursePolo->course_id = $course->id;
                    $coursePolo->polo_id = $poloId;
                    $coursePolo->registration_price = $polos[$poloId];
                    $coursePolo->available = 1;
                    $coursePolo->save();
                }
            }
            
        }

       return redirect()->route('admin.showCourse', ['slug'=> $course->slug])->withMessage(['message'=> 'Polo Criado com Sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $course = Course::where('slug', $slug)->first();

        foreach(CoursePolo::where('course_id', $course->id)->get() as $coursePolo){
            $coursePolo->delete();
        }
        $course->delete();
    }
}
