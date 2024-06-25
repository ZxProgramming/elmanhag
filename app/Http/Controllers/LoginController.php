<?php
namespace App\Http\Controllers;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    // Function Index About Login 
    public function index(){
        return view('/login');

    }
      //  public function __construct() {
      //   $this->middleware('auth.teacher');
      //    }
    public function store(Request $request){
     $request->validate([
        'email' => 'required|email',
        'password' => 'required',
     ],[
        'email.required' => "The Email Can't Be Empty",
        'email.email' => "The Email Is Not Valid",
        'password.required' => "The Password Can't Be Empty",
        // 'password.min' => "The Password Is Short ",
     ]);

$user = DB::table('users')->where('email',$request->email)->first();
      if(!$user){
        return redirect()->route('login.index')->withErrors(['error'=>'Email or Password Invalid']);
         
      }
      if(!password_verify($request->password,$user->password)){
         return redirect()->route('login.index')->withErrors(['error'=>'Email or Password Invalid']);

      }
            // Auth::guard('education')->loginUsingId($user->id);
     $credentials = $request->only('email', 'password');
    
     $authenticated = Auth::guard('education')->attempt($credentials);
        if (!$authenticated) {
        return redirect()->route('login.index')->withErrors(['error'=>'Email or Password Invalid']);
        
      }        
               
       if($user->position == 'teacher'){
         return redirect()->route('Teachers')->with(['succes'=>'Logged In']);
       }elseif($user->position == 'admin'){

         return redirect()->route('dashboard-analytics')->with(['succes'=>'Logged In']);
       }elseif($user->position == 'video editor leader'){

         return redirect()->route('videoEditorLead')->with(['succes'=>'Logged In']);
       }elseif($user->position == 'video editor'){

          // Return From Video Editor 
              return redirect()->route('videoEditor');

       }elseif($user->position == 'follow_up'){

         return redirect()->route('follow_up')->with(['succes'=>'Logged In']);
       }elseif($user->position == 'user_admin'){

        return redirect()->route('UserAdmin')->with(['succes'=>'Logged In']);

      }elseif($user->position == 'student'){

        return redirect()->route('stu_dashboard')->with(['succes'=>'Logged In']);

      }else{
        return "Error";
       }


      //   return view('teacher.dashboard',compact('user'));

        
    }
    
    public function destroy(request $request){
      $request->session()->regenerateToken();
      $request->session()->invalidate();

       return redirect()->route('login.index');

    }
   //  public function teacher(){
   //   return view('teacher.dashboard',compact('user'));
   //  }
}
