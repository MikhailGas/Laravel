<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CRUDUsersController extends Controller
{
    public function index(){
        return view('admin.users.index', ['users' => User::all(), 'auth_user' => Auth::user()->name]);
    }

    public function toggle(Request $request, User $user){
        
        if($request->isMethod('post')){
        
            if($user->isAdmin == 1){
                $user->isAdmin = 0;
            }else{
                $user->isAdmin = 1;
            }

            $user->save();
            
            return (json_encode(['result' => $user->isAdmin]));
        }
    }

    public function delete(User $user){
        $user->delete();
        return redirect('user/');
    }

    public function edit(User $user){
        
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request){
      
        if ($request->isMethod('put')){
            $this->validate($request,User::rules());
            $user->fill($request->all());
            $user->password = Hash::make($request->new_password);
            $user->isAdmin = 0;
            
            $user->save();
            $request->flash();
            
           
        }
        return redirect('user/');
    }
}
