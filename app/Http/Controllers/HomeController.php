<?php

  

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;
use App\Models\Regforms;
use App\Models\User;
use App\Models\Election;
use App\Models\Votes;
use App\Models\Poll;
use Auth;
use DB;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Mail;
use Hash;
use File;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FormsImport;
use App\Imports\FormsExport;
use \Illuminate\Support\Facades\URL;


  

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {
       $session_election=Election::where('vote_session','=',1)->first();

       $user =  User::find(Auth::user()->id);
      // $elected = Votes::select('employee_id')->where('voter_id','=',$user->id)->get();
       $elected =  DB::table('users_vote')  
          ->join('elections', 'users_vote.election_id', '=', 'elections.id') 
          ->join('users', 'users_vote.employee_id', '=', 'users.id') 
          ->where('elections.vote_session', '=',  1 )->where('voter_id','=',$user->id)->get();
       
   
      
      // $elected_user =  DB::table('users_vote')  
          //  ->join('elections', 'users_vote.election_id', '=', 'elections.id') 
          //  ->where('elections.vote_session', '=',  1 )->get(); 
            
   // $elected_user = User::find($elected->id); 
            $elect = Votes::select('employee_id')->where('voter_id','=',$user->id)->where('election_id', '=',  $session_election->id )->get();
             $elect_user = User::find($elect); 

       $users=User::where('id', '!=', auth()->id())->whereNotIn('id', $elect) // exclude already voted
    ->where('type','=',0)->get();
      
            //User::where('id', '!=', auth()->id()) // exclude already voted
   //->where('type','=',0)->get();

        return view('home')
        ->with('users',$users)
        ->with('elected', $elected)
        ->with('session_election', $session_election);

    } 

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome()

    {

    $elects =  DB::table('poll') 
            ->join('users', 'poll.employee_id', '=', 'users.id') 
            ->join('elections', 'poll.election_id', '=', 'elections.id') 
            ->where('elections.vote_session', '=',  1 )->orderBy('votes','desc')->limit(6)->get();


     $session_election=Election::where('vote_session','=',1)->first();
 

        return view('admin.dashboard')
        ->with('elects', $elects)
        ->with('session_election', $session_election);

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function managerHome()

    {

        return view('managerHome');

    }

}