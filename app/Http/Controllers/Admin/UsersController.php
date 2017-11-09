<?php
/**
 * Created by PhpStorm.
 * User: hatefshamshiri
 * Date: 3/8/17
 * Time: 9:56 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Order;
use App\Profile;
use App\Shamshiri\C\AuthValues;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    //start of users
    public function getUsers(Request $request,$page_number){

        $step=5;
        $skip=($page_number-1)*$step;

        $users=User::where('id','!=',Auth::id())->skip($skip)->take($step)->get();

        $newUsers=array();
        $i=0;
        foreach ($users as $user){
            $newUsers[$i]=$user;
            $newUsers[$i]['profile'] = User::find($user->id)->profile;
            $i++;
        }
        if(Auth::user()->role==AuthValues::ROLE_ADMIN) {
            echo json_encode($newUsers);
        }else{
            echo json_encode(["message"=>"authentication failed"]);
        }
    }
    public function deleteUser(Request $request){

        $input=Input::all();
        if(Auth::user()->role==AuthValues::ROLE_ADMIN) {
            $user=User::find($input["id"]);
            $profile=Profile::find($user->profile->id);
            if($profile!=null){
                $profile->delete();
            }
            $user->delete();
        }
    }

    public function upgradeUser(Request $request){

        $input=Input::all();
        if(Auth::user()->role==AuthValues::ROLE_ADMIN) {
            $user=User::find($input["id"]);
            $user->role=$input["role"];
            $user->save();
        }
    }


    public function users(){
        if(Auth::user()->role==AuthValues::ROLE_ADMIN) {
            $view=View::make("admin.users");
            return $view;
        }
    }
    public function getOrders($page=1){
        $take=3;
            $orders=Order::where([
                ["user_id","=",Auth::user()->id],
                ["status","=","success"]
            ])->skip(($page-1)*3)->take($take)->get();

        $lastPage=false;
        $count=Order::where([
            ["user_id","=",Auth::user()->id],
            ["status","=","success"]
        ])->count();
        $pages=$count/$take;
        if($page>=$pages){
            $lastPage=true;
        }
        $view=View::make("user.orders",["orders"=>$orders]);
        return $view->with("page",$page)->with("lastPage",$lastPage)
            ->with("pages",$pages);;
    }
    public function support(Request $request){
        $view = View::make("forms.email.support");
        if($request->isMethod("post")){
            $input=$request->all();
            Mail::send('emails.support', ['data'=>$input], function ($m)  {
                $m->from('hello@app.com', 'Your Application');

                $m->to("hatef.icontact@gmail.com", "Hatef Shamshiri")->subject('Support');
            });
        }
        return $view;
    }



    //end of users
}