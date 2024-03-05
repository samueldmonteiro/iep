<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Polo;
use Illuminate\Support\Facades\Vite;

class HomeController extends Controller
{
    public function home(){

        $head = $this->optimizer->optimize(
            'Home - Instituto Educacional Profissionalizante (IEP)',
            'IEP, A maior escola técnica da baixada Maranhense',
            route('front.index'),
            Vite::asset('resources/images/logo.jpg')
        )->render();


        return view('front.index', [
            'head' => $head,
            'courses' => Course::limit(3)->get(),
            'polos' => Polo::all()
        ]);
    }

    public function contact(){

        $head = $this->optimizer->optimize(
            'Entre em Contato - Instituto Educacional Profissionalizante (IEP)',
            'IEP, A maior escola técnica da baixada Maranhense',
            route('front.contact'),
            Vite::asset('resources/images/logo.jpg')
        )->render();

        return view('front.contact', [
            'head'=> $head]);
    }
}
