<?php
/**
 * Created by PhpStorm.
 * User: hatefshamshiri
 * Date: 7/10/17
 * Time: 3:16 PM
 */

namespace App\Http\Controllers;


use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class PropertyController extends Controller
{

    public function index($sect){

        $inputs=Input::all();
        if(Input::get("p")!=null){
            $page=Input::get("p");
        }
        else{
            $page=1;
        }
        $take=5;
        $these=array();

        if(Input::get("section")!=null){
            $section=$sect;
        }
        else{
            $section="";
        }

        $sections["home"]="";
        $sections["featureds"]="";
        $sections["sales"]="";
        $sections["rentals"]="";
        $sections["index"]="";
        $sections["contact"]="";
        $sections[$sect]="active";
        $dCities=Property::distinct()->get(["place"]);
        $dTypes=Property::distinct()->get(["type"]);
        $cities=json_decode($dCities);
         if(array_key_exists("place",$inputs)) {
             $place = $inputs["place"] ;
             if($place!=null) {
                 $these[] = ["place", "=", $inputs["place"]];
             }

         }
         else{
             $place="";
         }
         if(array_key_exists("area",$inputs)) {
             $area = $inputs["area"];

             if($area!=null) {
                 $these[] = ["area", ">=", $inputs["area"]];
             }
         }
         else{
             $area="";
         }
         if(array_key_exists("min_price",$inputs)) {

             $min_price = $inputs["min_price"];
             if($min_price!=null) {
                 $these[] = ["price", ">=", $inputs["min_price"]];
             }
         }
         else{
             $min_price="";
         }
         if(array_key_exists("max_price",$inputs)) {

             $max_price = $inputs["max_price"];
             if($max_price!=null) {
                 $these[] = ["price", "<=", $inputs["max_price"]];
             }
         }
         else{
             $max_price="";
         }
            $min_area = Property::min("area");
        $max_area = Property::max("area");

         if(array_key_exists("deal_type",$inputs)) {

             $dealType = $inputs["deal_type"];
             if($dealType!=null){
             $these[]=["deal_type","=",$inputs["deal_type"]];
                 }
         }
         else{
             $dealType="";
         }
         if(array_key_exists("featured",$inputs)) {

             $featured = $inputs["featured"];
             if($featured!=null){
                $these[]=["featured","=",$inputs["featured"]];
             }
         }
         else{
             $featured="off";
         }
        if(array_key_exists("type",$inputs)) {

            $type = $inputs["type"];
            if($type!=null){
                $these[]=["type","=",$inputs["type"]];
            }
        }
        else{
            $type="";
        }
        if(!Auth::guest()){
            if(Auth::user()->role=="ROLE_ADMIN"){

            }
        }else{
            $these[]=["status","=","approved"];
        }

        $query=Property::where($these)->orderBy("created_at","DESC");
         $count=$query->count();

         $pages=$count/$take;
         if($page>=$pages){
             $lastPage=true;
         }
         $properties=$query->skip(($page-1)*$take)->take($take)->get();


         return View::make("properties.listing",["types"=>$dTypes,"sections"=>$sections,"properties"=>$properties,"pages"=>$pages,"cities"=>$cities,"inputs"=>["place"=>$place,
             "area"=>$area,"min_price"=>$min_price,"deal_type"=>$dealType,"max_price"=>$max_price,"featured"=>$featured,"type"=>$type,"min_area"=>$min_area,"max_area"=>$max_area]]);


//

    }
    public function add(Request $request){

        $sections["home"]="";
        $sections["featureds"]="";
        $sections["sales"]="";
        $sections["rentals"]="";
        $sections["index"]="";
        $sections["contact"]="";

            if($request->isMethod("post")){
                $input=Input::all();
                $property = new Property();
                $path=Storage::disk('uploads')->put('photos/1', $request->file('file'));
                $property->featured = "off";
                $property->area = $input["area"];
                $property->deal_type = $input["deal_type"];
                $property->type = $input["type"];
                $property->place=$input["place"];
                $property->price=$input["price"];
                $property->image=$path;
                $property->description=$input["description"];
                $property->title=$input["title"];
                $property->location=$input["location"];
                $property->owner=$input["owner"];
                $property->phone=$input["phone"];
                $property->deposit=$input["deposit"];
                $property->age=$input["age"];
                if(!Auth::guest()){
                    if(Auth::user()->role=="ROLE_ADMIN"){
                        $property->status='approved';
                    }
                }else{
                    $property->status='pending';
                }
                if ($property->save()) {

                    return Redirect::back();
                }

        }
        return View::make("properties.add")->with("sections",$sections);
    }


    public function modify(Request $request){

        $roles=
            [
                "ROLE_ADMIN"
            ];
        $property = Property::find(Input::get("id"));

        if(in_array(Auth::user()->role,$roles))
        {
            if($request->isMethod("post")){
                $input=Input::all();
                $property = Property::find($input["id"]);
                $path=Storage::disk('uploads')->delete($property->image);
                $path=Storage::disk('uploads')->put('photos/1', $request->file('file'));

                $property->area = $input["area"];
                $property->deal_type = $input["deal_type"];
                $property->type = $input["type"];
                $property->place=$input["place"];
                $property->price=$input["price"];
                $property->image=$path;
                $property->description=$input["description"];
                $property->title=$input["title"];
                $property->location = $input["location"];
                $property->owner=$input["owner"];
                $property->phone=$input["phone"];
                $property->deposit=$input["deposit"];
                $property->age=$input["age"];
                if ($property->save()) {

                    return redirect()->route('single_property',["id"=>$property->id]);
                }
            }
        }
        return View::make("properties.modify")->with("property",$property);
    }

    public function remove(Request $request){

        $roles=
            [
                "ROLE_ADMIN"
            ];
        $property = Property::where("id","=",Input::get("id"))->first();
        $inputs=Input::all();

        if(in_array(Auth::user()->role,$roles))
        {
            if($request->isMethod("post")){
                if($inputs["remove"]=="حذف") {
                    $input = Input::all();
                    $property = Property::where("id", "=", $input["id"]);
                    $imageurl=$property->first();
                    $path=Storage::disk('uploads')->delete($imageurl->image);

                    if ($property->delete()) {

                        return redirect()->route("listing",["sect"=>"index"]);
                    }
                }
                else{
                    return redirect()->route("listing",["sect"=>"index"]);
                }
            }
        }
        return View::make("properties.remove");
    }
    public function single($id){
        $property=Property::where("id","=",$id)->first();


        $sections["home"]="";
        $sections["featureds"]="";
        $sections["sales"]="";
        $sections["rentals"]="";
        $sections["index"]="";
        $sections["contact"]="";
        $location=explode(",",$property->location);
        return View::make("properties.single",["sections"=>$sections,"property"=>$property,"location"=>$location]);
    }

    public function promote($id,$val){
        $property = Property::where("id","=",$id)->first();

        $property->featured=$val;
        if ($property->save()) {

            return Redirect::back();
        }
    }
    public function approve($id){
        $property = Property::where("id","=",$id)->first();

        $property->status="approved";
        if ($property->save()) {

            return Redirect::back();
        }
    }

    public function citiesJSON(){
        $city=Input::get("city");
        $places =Property::distinct("place")->where("place","LIKE","$city%")->select("place")->get();
        foreach ($places as $place){
            $cities[]=$place->place;
        }
        return json_encode($cities);

    }
    public function typesJSON(){
        $type=Input::get("type");
        $mTypes =Property::distinct("type")->where("type","LIKE","$type%")->select("type")->get();
        foreach ($mTypes as $mType){
            $types[]=$mType->type;
        }
        return json_encode($types);

    }

}