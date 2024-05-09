<?php

namespace App\Http\Controllers;
use App\models\gym;
use App\models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mapas(){
        $gyms= gym::all();
        $sliders= slider::all();
        return view('mapas',['gyms'=>$gyms,'sliders'=>$sliders]);

    }
    public function index(){
        $sliders= slider::all();
        return view('inicio',['sliders'=>$sliders]);

    }
    public function nosotros(){
        return view('nosotros');
    }
    public function servicios(){
        return view('servicios');
    }
    public function localdet($id){
     $gym = Gym::with('clases')->where('id', $id)->first();

     return view('localdet',['gym'=>$gym]);
    }
    public function locales(){
        $gyms= gym::all();
        return view('locales',['gyms'=>$gyms]);
    }
}
