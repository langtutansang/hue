<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Admin;
use Auth;

class AdminController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'account', Admin::class);
    }

    public function buildInputVarIndex(){
        $admin = Auth::guard('admin')->user();
        if( $admin->master != 0 )
            return [
                'model' => $this->model::all(),
            ];
         else return [
            'model' => $this->model::where('id', Auth::guard('admin')->id())->get(),
         ];
    }

    public function destroy($id)
    {   
        $result = $this->model::find($id)->delete();
        return ($result? 1 : 0);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $admin = Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json([ 'data' => View("admin.$this->view.item", ['row' => $admin ])->render()]);
    }

    public function update(Request $request, $id)
    {   
        if($request->get('password_old') && $request->get('password_old') != NULL ){
            $data = $request->all();
            if( $data['password'] == $data['password_confirmation'] && Hash::check($data['password_old'], Auth::guard('admin')->user()->password )){
                $data['password']  = Hash::make($data['password']);

                unset( $data['password_old']);
                unset( $data['password_confirmation']);

                $result = $this->model::where('id', $id)->update( $data);
            }
            else return response()->json(['status' => 500]);
        }
        else  $result = $this->model::where('id', $id)->update(['name'=>$request->get('name')]);
       
        if($result != 1) return response()->json(['status' => 500]);

        $row = $this->model::find($id);
        return response()->json([ 'data' => View("admin.$this->view.item", ['row' => $this->model::find($id) ])->render(), 'status'=> 200]);
    }

}
