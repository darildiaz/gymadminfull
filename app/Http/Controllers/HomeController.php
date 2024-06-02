<?php

namespace App\Http\Controllers;
use App\models\gym;
use App\models\categoria;
use App\models\cliente;
use App\models\entrenador;
use App\models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mapas(){
        $gyms= gym::all();
        $sliders= slider::all();
        return view('mapas',['gyms'=>$gyms,'sliders'=>$sliders]);

    }
    public function demo(){
        $gyms= gym::all();
        $sliders= slider::all();
        return view('demo',['gyms'=>$gyms,'sliders'=>$sliders]);

    }
    public function index(){
        
        $gyms= gym::all();
        $gymscant= gym::all()->count();
        $clientecant= cliente::all()->count();
        $entrenadorcant= entrenador::all()->count();
        $sliders= slider::all();
        return view('inicio',['sliders'=>$sliders,'gyms'=>$gyms,'gymscant'=>$gymscant,'clientecant'=>$clientecant,'entrenadorcant'=>$entrenadorcant]);

    }
    public function nosotros(){
        return view('nosotros');
    }
    public function servicios(){
        return view('servicios');
    }
    public function localdet($id){
     $gym = Gym::with('actividads')->where('id', $id)->first();

     return view('localdet',['gym'=>$gym]);
    }
    public function locales(){
        $categorias = categoria::all();
        $gyms= gym::all();
        return view('locales',['gyms'=>$gyms,'categorias'=>$categorias]);
    }
}
