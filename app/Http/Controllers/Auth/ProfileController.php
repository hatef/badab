<?php
/**
 * Created by PhpStorm.
 * User: hatefshamshiri
 * Date: 11/4/16
 * Time: 7:33 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


    }



    public function modify(Request $data){
            if ($data->isMethod("POST")){

            }

    }

}