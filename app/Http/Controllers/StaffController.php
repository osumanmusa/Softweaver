<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Staff;
use Redirect;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $staffs=Staff::select('*')->orderBy('created_at', 'desc')->paginate(10);
        return view('staff.index',compact('staffs'));
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
        $request->validate([
            'Firstname' => 'required',
            'Lastname' => 'required',
            'date_of_joining' => 'required',
            'education'=>'required',
        ]);
        $user_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('assets/images/'), $user_image);
       $code=staff::max('staff_id');
       if($code == ""){
        $alphagen = "S0001";
        $staff_id = $alphagen;
       }
       else{
        $staff_id= ++$code;
       }
       
    
        $staffreg = new Staff();
        $staffreg->staff_id = $staff_id; 
        $staffreg->Firstname = $request->Firstname;
        $staffreg->Lastname = $request->Lastname;
        $staffreg->date_of_joining = $request->date_of_joining;
        $staffreg->sex = $request->sex;
        $staffreg->Education = $request->education;
        $staffreg->staff_image = $user_image;
        $staffreg->save();

        if ($staffreg) {
            Toastr::success('staff Added successfully :)','success');
            return back();
        }
        else {
             Toastr::error('Something went wrong :)','error');
            return back();
        }
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
        $staff= Staff::find($id);
       return view('staff.show',compact('staff'));

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
        if($request->image == ""){
        $request->validate([
            'Firstname' => 'required',
            'Lastname' => 'required',
            'date_of_joining' => 'required',
            'sex' => 'required',
            'education' => 'required',
        ]);


            $staff_update = staff::where('id', $id)
              ->update(
                  [ 
                    'Firstname' => $request->Firstname,
                    'Lastname' => $request->Lastname,
                    'date_of_joining' => $request->date_of_joining,
                    'sex' => $request->sex,
                    'Education' => $request->education,
                ]);

        if ($staff_update) {
            Toastr::success('Updated successfully :)','success');
            return redirect::route('staff.list');
               }

        }else{
            $request->validate([
            'Firstname' => 'required',
            'Lastname' => 'required',
            'date_of_joining' => 'required',
            'sex' => 'required',
            'education' => 'required',

        ]);

        $user_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('assets/images/'), $user_image);

            $staff_update = staff::where('id', $id)
              ->update(
                  [ 
                    'Firstname' => $request->Firstname,
                    'Lastname' => $request->Lastname,
                    'date_of_joining' => $request->date_of_joining,
                    'sex' => $request->sex,
                    'Education' => $request->education,
                    'staff_image'=> $user_image,
                ]);

        if ($staff_update) {
            Toastr::success('Updated successfully :)','success');
            return redirect::route('staff.list');
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
                   
        $del= Staff::find($id);
        $del->delete();
      
        Toastr::success('Delete successfull :)','success');
       return redirect()->route('staff.list');
    }
}
