<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::orderBy('created_at', 'desc')->paginate(10);
            
        if ($request->ajax()) {
          return view('admin.user.ajax', compact('user'));
      
        } else {
            return view('admin.user.index', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::pluck('name');
        return view('admin.user.add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->all();
        $user = new User();
        // database = name text
        $user->name = $request->name;
        $user->account = $request->account;
        $user->password = $request->password;
        $user->status = '0';

        $user->save();     

        Session::flash('ketqua','Add successful');
        return redirect('admin/user');
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
        $user_edit = User::findOrFail($id);
        return view('admin.user.edit', compact('user_edit'));
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
        $user = User::findOrFail($id);
    
        $user->name = $request->name;
        $user->account = $request->account;
        $user->password = $request->password;
        $user->status = $request->status;
         
        $user->save();
        
        Session::flash('ketqua','Edit successful');
        return redirect('admin/user');
    }
    public function active(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->name = $request->name;
        $user->account = $request->account;
        $user->password = $request->password;
        $user->status = '1';
         
        $user->save();
        
        Session::flash('ketqua','Edit successful');
        return redirect('admin/user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Delete '.$data->name.' successful!!!');
        return redirect('admin/user');
    }
}
