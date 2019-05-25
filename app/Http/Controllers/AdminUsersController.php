<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UsersRequest;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $working_days = array(
                                '0'=>'sat',
                                '1'=>'sun',
                                '2'=>'mon',
                                '3'=>'tue',
                                '4'=>'wed',
                                '5'=>'thu',
                                '6'=>'fri',
                          );
        $users = User::all();
        $today = strToLower(date('D'));
        return view('admin.users.index', compact('users', 'today', 'working_days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $role = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
    
       $input = $request->except('activator', 'password_confirm');
      
      // $input['password'] = bcrypt($request->password);

       $days = $request->day;
       $day = implode(',', $days);

       $input['day'] = $day;
      
       if ($file = $request->file('photo_id')) {
           
           $name = time() . $file->getClientOriginalName();

           $file->move('images', $name);

           $photo = Photo::create(['file'=>$name]);

           $input['photo_id']=$photo->id;
       }

       $input['gender'] = $request['gender'];

      User::create($input);

      $user = User::orderBy('created_at', 'desc')->first();

      Session::flash('user_created', 'User ' . $user->name . ' created Successfully');

      return redirect('admin/users'); 

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //$working_days = array( 0 => 'Mon', 1 => 'Tue', 2 => 'Wed', 
          //             3 => 'Thu', 4 => 'Fri', 5 => 'Sat', 6 => 'Sun' );

        $working_days = array(
                                '0'=>'sat',
                                '1'=>'sun',
                                '2'=>'mon',
                                '3'=>'tue',
                                '4'=>'wed',
                                '5'=>'thu',
                                '6'=>'fri',
                          );
        $user = User::findOrFail($id);
        $saved_working_days = (explode(',' , $user->day));
        $role = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('role', 'user','working_days', 'saved_working_days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {

        $data = $request->all();
        $user = User::findOrFail($id);

        //validate unique email and ignore the current email

         $validator = Validator::make($data, [
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($user->id),
                ],
            ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        //if password doesn't exist
         if (trim($request->password) == '') {
                $input = $request->except('password', 'activator', 'password_confirm');
            }else{
                $input = $request->except('activator', 'password_confirm');
                $input['password'] = $request->password;
            }
            

            //working days array
                $days = $request->working_days;
                $day = implode(',', $days);
                $input['day'] = $day;
                

            if ($file = $request->file('photo_id')) {
                if ($user->photo) {
                    unlink(public_path(). $user->photo->file);
                }
                $name = time() . $file->getClientOriginalName();

                $file->move('images', $name);
                //either this to update photo
               /* if ($user->photo_id) {
                    $user->photo()->delete();
                }*/
                //$photo = Photo::create(['file'=>$name]);
                //or this 
                $user->photo()->update(['file'=>$name]);
                $photo = Photo::whereId($user->photo_id)->first();
                $input['photo_id'] = $photo->id;
        }

            $user->update($input);

            Session::flash('user_updated', 'User '.$user->name.' updated successfully');

            return redirect('/admin/users');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $user = User::findOrFail($id);

    	if ($user->id !== Auth::user()->id) {
	        if ($user->photo) {
	            unlink(public_path(). $user->photo->file);
	        }
	        Session::flash('user_deleted', 'User '. $user->name .' deleted successfully');
	        $user->photo()->delete();
	        $user->delete();
    	}else{
    		return redirect('admin/users')->with('own_delete', 'You cant delete yourself ! Sorry');
    	}

        return redirect('admin/users');
    }

    public function profile($id){

        $user = User::findOrFail($id);
        //$user = User::whereId($id)->first();
        return view('admin/users/profile', compact('user'));

    }
   
}
