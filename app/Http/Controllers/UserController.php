<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Mailverification;
use Illuminate\Support\Carbon;
use Mail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'     => 'required',
            'lastname'     => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,bmp,ico|max:1024',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();
            if (!file_exists('thumbnail_images/')) {
                mkdir('thumbnail_images/', 0777, true);
            }
            $image->move('thumbnail_images/', $imageName);
        }else {
            $imageName = 'default.png';
        }
        
   
        
        $imageUrl = 'thumbnail_images/'.$imageName;
        $user= new User();
        $user->name =strtolower(trim($request->firstname.$request->lastname));
        $user->email = strtolower(trim($request->email));
        $user->password = bcrypt($request->password);
        $user->photo = $imageUrl;
        $user->email_verification_token = str_random(32);
        $user->save();

        Mail::to($user->email)->send(new Mailverification($user));
        return redirect('user/create')->with('msg', 'Verify your email to  active your account');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyMail($token = null)
    {
        if ($token==null) {
            return redirect('user/create')->with('msg', 'invalid token');
        }

        $user = User::where('email_verification_token', $token)->first();

        if ($user==null) {
            
            return redirect('user/create')->with('msg', 'Not found token');

        }

        // return $user;
        $user->email_verified = 1;
        $user->email_verified_at = Carbon::now();
        $user->email_verification_token = ' ';
        $user->save();
        return redirect('login2')->with('msg', 'Account activation success, now you can login');
    }

    public function loginform()
    {
        return view('login');
    }



    public function loginprocess(Request $request)
    {
        $this->validate($request,[
            'email'     => 'required|email',
            'password'     => 'required',
            
        ]);

        $credentials = $request->except('_token');
        if(auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->email_verified == 0) {
                auth()->logout();

                return redirect('login')->with('msg', ''.$user->name.' Verify your Emial and Activate your account first');
            }
           return redirect('/');
           Session::push('user_id', 'value');
        }

        session()->flash('type', 'danger');
        session()->flash('msg', 'incorrect credentials, try again');
        return redirect('login')->with('msg', 'incorrect credentials, try again');



    }

    public function logout()
    {
        // Auth::logout();
        auth()->logout();
        return redirect('/')->with('msg', 'Booom');
    }
}
