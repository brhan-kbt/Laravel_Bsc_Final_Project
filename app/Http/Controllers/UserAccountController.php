<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\QueryMessage;

class UserAccountController extends Controller
{
    use QueryMessage;
    

    // public function redirectTo(){
    //     switch (Auth::user()->userType) {
    //         case 'super':
    //            $this->redirectTo('/admin');
    //            return  $this->redirectTo;
    //             break;
    //         case 'member':
    //            $this->redirectTo('/user');
    //            return  $this->redirectTo;
    //             break;
                
    //         case 'memberadmin':
    //            $this->redirectTo('/member/admin');
    //            return  $this->redirectTo;
    //             break;
            
    //         default:
    //             # code...
    //             break;
    //     }
    // }


//   public function __construct()
//     {
//         $this->middleware('auth');
//     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
         // return view('layouts.admin_dash');

    }   
    
    
    public function admin()
    {
        return view('super-admin.dashboard');
    }

     public function user()
    {
        $messages=$this->getAllMessage();
        $notifications=$this->getNotifications();
        return view('user.home')->with('messages', $messages)->with('notifications', $notifications);
    } 
    
    public function register()
    {
      return view('memberadmin.registerform');

    }

     public function memberadmin()
    {
        return view('memberadmin.dashboard');
    }
      public function pradmin()
    {
        return view('pradmin.dashboard');
    }


    public function financemgr()
    {
        return view('financeAdmin.dashboard');
    }

   
     public function PasswordReset(Request $request)
     {
         $username=$request->input('username');
         $data=UserAccount::where('username',$username)->get();

         return view('auth.passwords.reset')->with('username',$username);
     }
    
     public function resetPassword()
     {
         return view('auth.passwords.email');
     }

     public function updatePassword(Request $request)
     {
        $username=$request->input('username');
        $newPassword=Hash::make($request->input('newPassword'));
        $confirmPassword=Hash::make($request->input('confirmPassword'));
        $users=UserAccount::where('username',$username)->get();
        if ($request->input('newPassword') === $request->input('confirmPassword')) {
            foreach ($users as $user) {
                $user->password=$newPassword;
                $user->save();
            }

            return redirect('/login');
        }
     }

     
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        // dd($credentials['username']);
       
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            if(Auth::user()->userType=='member' ){
                if (Auth::user()->member->status=="1") {
                 return redirect()->route('user');
                 
                }
                else{
                    // $this->guard()->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    return back()->withErrors([
                        'username' => 'Your Account is inActive. Please contact Admin.',
                    ]);
                }
            }
            else if(Auth::user()->userType=='super'){
                 return redirect()->route('admin');
            }
            else if(Auth::user()->userType=='memberadmin'){
                 return redirect()->route('member-mgr');
            }

             else if(Auth::user()->userType=='pradmin'){
                 return redirect()->route('pradmin');
            }

            else if(Auth::user()->userType=='financemgr'){
                 return redirect()->route('financemgr');
            }

            else if(Auth::user()->userType=='educmgr'){
                 return redirect()->route('educmgr');
            }
        }
       
        else{
          return back()->withErrors([
             'username' => 'InValid credentials.(Username or Password)',
                ]);
        }
       
    }

}