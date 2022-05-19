<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = User::where('role','us')->orderBy('id','DESC')->get();

        return view('admin.users.index', compact('u'));
    }

    public function indexsa()
    {
        $u = User::where('role','sa')->orderBy('id','DESC')->get();

        return view('admin.sa.index', compact('u'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    public function createsa()
    {
        return view('admin.sa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'hp' => 'required|max:14',
            'email' => 'required|email',
            'password' => 'required|alpha_num',
            'role' => 'required',
            'status' => 'required',
        ]);

        // User::create($validate);

        $u = new User();
        $u->firstname = $request->firstname;
        $u->lastname = $request->lastname;
        $u->hp = $request->hp;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->role = $request->role;
        $u->status = $request->status;

        $u->save;

        Alert::success('Alhamdulillah!', 'User baru berhasil disimpan!');
        return redirect('admin/user/home');
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
        if(Auth::user()->id == $id)
        {
            $u = User::where('id',$id)->first();

            return view('admin.users.edit',compact('u'));
        }
        else
        {
            return redirect('admin/user/edit/'.Auth::user()->id);
        }
        
    }

    public function editsa($id)
    {
        if(Auth::user()->id == $id)
        {
            $u = User::where('id',$id)->first();

            return view('admin.sa.edit',compact('u'));
        }
        else
        {
            return redirect('admin/user/edit/'.Auth::user()->id);
        }
        
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
        $validate = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'hp' => 'required|max:14',
            'email' => 'required|email',
            'password' => 'required|alpha_num',
            'role' => 'required',
            'status' => 'required',
        ]);

        // Form::where('id',$id)->update($validate);
        $u = User::find($id);
        $u->firstname = $request->firstname;
        $u->lastname = $request->lastname;
        $u->hp = $request->hp;
        $u->email = $request->email;
        $u->password = empty($request->password) ? $u->password : Hash::make($request->password);
        $u->role = $request->role;
        $u->status = $request->status;

        $u->save;

        Alert::success('Alhamdulillah!', 'User baru berhasil diupdate!');
        return redirect('admin/user/edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();

        Alert::success('Alhamdulillah!', 'User berhasil dihapus!');
        return redirect()->back();
    }
}
