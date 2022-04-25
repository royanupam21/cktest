<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Socialite;
use Exception;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login.login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
   
            $finduser = User::where('google_id', $user->id)->first();
   
            if($finduser){
   
                Auth::login($finduser);
  
                return redirect('/user/manage-users');
   
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id
                ]);
  
                Auth::login($newUser);
   
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    public function authLogin(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/user/manage-users');
        }

        return back()->with('error','Invalid credential please try again!');
    }

    protected function createAdmin(Request $request)
    {
        $obj=new User;
        $obj->fname=$request->first_name;
        $obj->lname=$request->last_name;
        $obj->email=$request->email;
        $obj->dob=$request->dob;
        $obj->gender=$request->gender;
        $obj->anual_income=$request->anual_income;
        $obj->occupation=$request->job;
        $obj->family_type=$request->family_type;
        $obj->mangalik=$request->mangalik;
        $obj->password=Hash::make($request->password);
        $obj->save();

        //return redirect()->intended('login/admin');
        return redirect('user/manage-users')->with('success','Profile crerated successfully!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.login.test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $datas=Admin::find($id);

        return view('admin.profile',compact('datas'));
    }

    public function editmyprofile(Request $request)
    {
        $datas=Admin::find($request->id);
        return json_encode($datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $obj=Admin::find($request->txtID);
        $obj->first_name=$request->first_name;
        $obj->last_name=$request->last_name;
        $obj->email=$request->email;
        $obj->phone=$request->phone;
        
        $path = 'public/uploads/user';
         \File::makeDirectory($path, 0777, true, true);
        if($request->hasFile('txtProfilePic')){
            $imageName = "AUSR_".time().'.'.$request->txtProfilePic->getClientOriginalExtension();
            $request->txtProfilePic->move($path, $imageName);
            $url = asset(''.$path.'/'.$imageName);    

            $image_resize = Image::make($url);  
            $image_resize->resize(600, 600);  
            $image_resize->save($path.'/'.$imageName);

            $obj->photo=$imageName;
        }
        $obj->save();

        return redirect('admin/manage-profile/'.$request->txtID)->with('success','Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect('admin/manage-users')->with('success','User profile deleted successfully!');
    }

    public function users()
    {
        $gender=Auth::user()->gender;
        
        $datas=User::where("gender",($gender=="Male")?"Female":"Male")->inRandomOrder()->limit(10)->get();
        //User::orderBy('fname', 'asc')->paginate(25);
        return view('user.user.manage',compact('datas'));
    }

    public function findProfile(Request $request)
    {
        $datas=Admin::find($request->id);
        return json_encode($datas);
    }

    public function updateProfile(Request $request)
    {
        $obj=Admin::find($request->txtID);
        $obj->first_name=$request->txtFNameUp;
        $obj->last_name=$request->txtLNameUp;
        $obj->email=$request->txtEmailUp;
        $obj->phone=$request->txtPhoneUp;
        $obj->isactive=$request->txtIsPublishUp;
        $path = 'public/uploads/user';
         \File::makeDirectory($path, 0777, true, true);
        if($request->hasFile('txtPhotoUp')){
            $imageName = "BLGS_".time().'.'.$request->txtPhotoUp->getClientOriginalExtension();
            $request->txtPhotoUp->move($path, $imageName);
            $url = asset(''.$path.'/'.$imageName);    

            $image_resize = Image::make($url);  
            $image_resize->resize(600, 600);  
            $image_resize->save($path.'/'.$imageName);

            $obj->photo=$imageName;
        }
        $obj->sort_desc=$request->txtShortDescriptionUp;
        $obj->long_desc=$request->txtLongDescriptionUp;
        $obj->facebook=$request->txtFacebookUp;
        $obj->twitter=$request->txtTwitterUp;
        $obj->insta=$request->txtInstagramUp;
        $obj->linkedin=$request->txtLinkedinUp;
        $obj->save();

        return redirect('admin/manage-users')->with('success','Profile updated successfully!');
    }
}
