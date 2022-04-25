<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Admin;
use App\Models\Testimonial;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.login');
    }

    public function authLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/manage-users');
        }

        return back()->with('error','Invalid credential please try again!');
    }

    protected function createAdmin(Request $request)
    {
        $obj=new Admin;
        $obj->name=$request->txtFName;
        $obj->email=$request->txtEmail;
        $obj->phone=$request->txtPhone;
        $obj->password=Hash::make($request->txtPassword);
        $obj->save();

        //return redirect()->intended('login/admin');
        return redirect('admin/manage-users')->with('success','Profile crerated successfully!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.login.test');
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
        $datas=Admin::orderBy('id', 'desc')->paginate(25);
        return view('admin.user.manage',compact('datas'));
    }

    public function findProfile(Request $request)
    {
        $datas=Admin::find($request->id);
        return json_encode($datas);
    }
}
