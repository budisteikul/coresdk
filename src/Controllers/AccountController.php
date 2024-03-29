<?php

namespace budisteikul\coresdk\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use budisteikul\coresdk\Notifications\ChangeEmailNotification;
use budisteikul\coresdk\Models\User;
use budisteikul\coresdk\Models\ChangeEmail;
use Carbon\Carbon;

class AccountController extends Controller
{

    public function setting()
    {
        $user = Auth::user();
        return view('coresdk::account')->with(['user'=>$user]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $setting =  $request->input('setting');
        
        if($setting=="verification")
        {
            $id =  $request->input('id');
            $token =  $request->input('token');
			$changeEmail = ChangeEmail::where('user_id',$id)->where('token',$token)->first();
			
            if(!$changeEmail)
            {
                    $message = '<div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
       Verification link is not valid,<br /> click <a href="/home">here to continue</a>
        </div>';
                    return view("coresdk::change_email")->with('message',$message);
            }

            if(Carbon::parse($changeEmail->created_at)->addMinutes(60) <= Carbon::now())
             {
                 
                    $message = '<div class="alert alert-warning">
        <h4><i class="icon fa fa-warning"></i> Warning!</h4>
       Verification link has been expired,<br /> click <a href="/home">here to continue</a>
        </div>';
                    return view("coresdk::change_email")->with('message',$message); 
             }
			 
			 $changeEmail->User->email = $changeEmail->email;
			 $changeEmail->User->email_verified_at = Carbon::now();
			 $changeEmail->User->save();
			 
             $changeEmail->delete();
             
             $message = '<div class="alert alert-success">
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                                Successfully to change email address,<br /> click <a href="/home">here to continue</a>
                            </div>';
							
             return view("coresdk::change_email")->with('message',$message);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = Auth::user();
        $action =  $request->input('action');

        if($action=="profile")
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
            ]);
        
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors);
            }

            $name =  $request->input('name');

            $user = User::findOrFail($user->id);
            $user->name = $name;
            $user->save();
        
            return response()->json([
                    "id" => "1",
                    "message" => 'Success'
                ]);
        }
        
        if($action=="email")
        {
            $validator = Validator::make($request->all(), [
                'password' => 'required',
				'new_email' => 'required|email|unique:users,email',
            ]);
        
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors);
            }

            $new_email =  $request->input('new_email');
            $password =  $request->input('password');

            $user = User::findOrFail($user->id);
			
            $credentials = ['email' => $user->email, 'password' => $password];
            
			if (Auth::validate($credentials)) {
				
				$token = Str::random(60);
				$changeEmail = ChangeEmail::updateOrCreate(
					['user_id'=>$user->id],
					['email'=>$new_email,'token'=>$token]
				);
				
                $user->notify(new ChangeEmailNotification($token,$new_email,$user->id));
			   
                return response()->json([
                    "id" => "1",
                    "message" => 'Link verification for new email address has been sent to your new email address']);
            }
            else
            {
                return response()->json([
                    'password' => 'These credentials do not match our records.'
                ]);
            }

        }

        if($action=="password")
        {
            $validator = Validator::make($request->all(), [
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6',
                'password_confirmation' => 'required|string|min:6',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors);
            }
            
            $current_password = $request->input('current_password');
            $new_password = $request->input('new_password');
            $password_confirmation = $request->input('password_confirmation');
            
            if($new_password!=$password_confirmation)
            {
                return response()->json([
                    'new_password'=>'The password and password confirm field must be same.',
                    'password_confirmation'=>''
                ]);
            }
            
            $user = User::findOrFail($user->id);
            $credentials = ['email' => $user->email, 'password' => $current_password];
            if (Auth::validate($credentials)) {
                $user->password = Hash::make($new_password);
                $user->save();
                return response()->json([
                    "id"=>"1",
                    "message"=>'Update password success']);
            }
            else
            {
                return response()->json([
                    'current_password'=>'These credentials do not match our records.'
                ]);
            }
        }
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
}
