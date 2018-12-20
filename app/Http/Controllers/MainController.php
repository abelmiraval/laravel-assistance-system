<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;/*Es como hacer un import*/



	class MainController extends Controller{
		public function home(){
			/*Tenemos que crear un folder con el mismo nombre del controlador*/
			return view('main.home',["name"=>"Abel Saul Miraval Gomez"]);
		}
	}

 ?>