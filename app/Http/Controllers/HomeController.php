<?php

namespace App\Http\Controllers;

use  App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist(){

        return Category::where('parent_Id','=',0)->with('children')->get();
    }
    public static function subcategorylist($a){
        return Category::where('parent_Id',$a)->get();
    }

    //
    public function index(){
        $sliderdata=Product::all();
        $datalist1=Product::all();
        $setting=Setting::first();
        return view('home.index',[
            'sliderdata'=>$sliderdata,
            'datalist1'=>$datalist1,
            'setting'=>$setting
            ]

        );
    }
    public function contact(){
        $sliderdata=Product::all();
        $datalist1=Product::all();
        $setting=Setting::first();
        return view('home.contact',[
            'sliderdata'=>$sliderdata,
            'datalist1'=>$datalist1,
            'setting'=>$setting
            ]

        );
    }
    public function storemessage(Request $request){
        $data=new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = $request->ip();
        $data->save();
        return redirect()->route('contact')->with('info','Your message have been send');

    }

    public function about(){
        $sliderdata=Product::all();
        $datalist1=Product::all();
        $setting=Setting::first();
        return view('home.about',[
            'sliderdata'=>$sliderdata,
            'datalist1'=>$datalist1,
            'setting'=>$setting
            ]

        );
    }

    public function references(){
        $sliderdata=Product::all();
        $datalist1=Product::all();
        $setting=Setting::first();
        return view('home.references',[
            'sliderdata'=>$sliderdata,
            'datalist1'=>$datalist1,
            'setting'=>$setting
            ]

        );
    }


    public function product($id)
    {
        $images=DB::table('images')->where('product_id',$id)->get();
        $reviews = Comment::select('comments.*', 'users.name as user_name', 'users.id as user_id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.product_id',$id)->get();
        $data=Product::find($id);
        $setting=Setting::first();
        $sliderdata=Product::all();
        return view('home.product',[
                'data'=>$data,
                'images'=>$images,
                'setting'=>$setting,
                'sliderdata'=>$sliderdata,
                'reviews'=>$reviews
            ]);
    }

    public function test(){
        return view('home.test');
    }

    public function param($id,$num){
       // echo "Parameter 1 is :",$id;
       // echo "Name is :", $num;

        return view('home.test2',
            [
                'id' => $id,
                'num'=> $num
            ]);
    }

    public function save(Request $request){
        echo "index function!<br>";
        echo "name",$_REQUEST["fname"];
        echo "name",$_REQUEST["lname"];


    }
    public function faq(){
        $sliderdata=Product::all();
        $datalist1=Product::all();
        $setting=Setting::first();
        $faq=Faq::all();
        return view('home.faq',[
                'sliderdata'=>$sliderdata,
                'datalist1'=>$datalist1,
                'setting'=>$setting,
                'faq'=>$faq
            ]

        );
    }
    public function storecomment(Request $request){
        $data=new Comment();
        $data->user_id = Auth::id();
        $data->product_id = $request->input('product_id');
        $data->subject = $request->input('subject');
        $data->review  = $request->input('review');
        $data->rate  = $request->input('rate');
        $data->ip = $request->ip();
        $data->save();
        return redirect()->route('product',['id' =>$request->input('product_id')])->with('info','Your message have been send');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function loginadmincheck(Request $request): RedirectResponse
    {
       // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
