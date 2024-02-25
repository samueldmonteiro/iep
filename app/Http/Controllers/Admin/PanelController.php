<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Polo;

class PanelController extends Controller
{

    public function index(){
        return view('admin.index', [
            'registrations' => Registration::orderByDesc('id')->get()
        ]);
    }

    public function loginPage()
    {
        if(request()->user()){
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }

     public function login(Request $r)
    {
        $v = Validator::make($r->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if($v->fails()){
            return back()->withErrors([
                'error' => 'Login e/ou Senha Incorretos!'
            ])->onlyInput('username');
        }
 
        if (Auth::attempt(['username'=>$r->username, 'password'=> $r->password, 'admin'=>true])) {
            $r->session()->regenerate();
 
            return redirect()->route('admin.index');
        }
 
        return back()->withErrors([
                'error' => 'Login e/ou Senha Incorretos!'
        ])->onlyInput('username');
    }

    public function createCourse()
    {
        return view('admin.createCourse',[
            'polos' => Polo::all()
        ]);
    }

     public function createPortal()
    {
         return view('admin.createPolo');
    }


    public function showCourses()
    {
         return view('admin.courses.index');
    }


    public function showPolos()
    {
         return view('admin.polos.index', [
            'polos' => Polo::orderByDesc('id')->get()
         ]);
    }

    public function showCourse()
    {
         return view('admin.showCourses');
    }


    public function showPolo(Request $r)
    {
         return view('admin.polos.show', [
            'polo' => Polo::where('slug', $r->slug)->first()
         ]);
    }

    public function logout(Request $request)
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('front.index');
    }
}
