<?php

namespace App\Http\Controllers;

use App\Article;
use App\Profile;

use App\Property;

use App\Shamshiri;


use App\Template;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dCities=Property::distinct()->get(["place"]);
        $dTypes=Property::distinct()->get(["type"]);
        $sections["home"]="active";
        $sections["featureds"]="";
        $sections["sales"]="";
        $sections["rentals"]="";
        $sections["index"]="";
        $sections["contact"]="";

        $featureds=Property::where("featured","=","on")->where("status","=","approved")->take(3)->get();
        $latests=Property::orderBy("created_at","DESC")->where("status","=","approved")->take(3)->get();
        $view= View::make('home',["sections"=>$sections,"featureds"=>$featureds,"latests"=>$latests]);




        return $view->with("cities",$dCities)->with("types",$dTypes);
    }




    public function contactUs(){
        $sections["home"]="";
        $sections["featureds"]="";
        $sections["sales"]="";
        $sections["rentals"]="";
        $sections["index"]="";
        $sections["contact"]="active";
        return View::make("contact")->with("sections",$sections);
    }



}
