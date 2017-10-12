<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserValidate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidate $request)
    {
      try {
        $oUser = new User();
        $oUser->name = $request->name;
        $oUser->email = $request->email;
        $oUser->password = Hash::make($request->password);
        $oUser->role = $request->role;
        $oUser->created_at = date('Y-m-d H:i:s');
        $oUser->save();
        $json = [
          'status'=>true,
          'id'=>$oUser->id,
          'msg' => 'Record created successfully'
        ];
        return response($json);
      }
      catch(\Exception $e) {
        $json = [
          'status'=>false,
          'msg' => 'Failed to create the record',
          //'error' => $e->getMessage()
        ];
        return response($json);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oUser = User::find($id);
        return $oUser;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserValidate $request, $id)
    {
      try{
        $oUser = User::find($id);
        $oUser->name = $request->name;
        $oUser->email = $request->email;
        $oUser->password = Hash::make($request->password);
        $oUser->role = $request->role;
        $oUser->updated_at = date('Y-m-d H:i:s');
        $oUser->save();
        $json = [
          'status'=>true,
          'msg' => 'Record created successfully'
        ];
        return response($json);
      } catch (\Exception $e) {
        $json = [
          'status'=>false,
          'msg' => 'Failed to create the record',
          //'msg' => $e->getMessage()
        ];
        return response($json);
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
      try {
        $oUser = User::find($id);
        $oUser->delete();
        $json = [
          'status'=>true,
          'msg' => 'Record removed successfully'
        ];
        return response($json);
      } catch(\Exception $e) {
        $json = [
          'status'=>false,
          'msg' => 'Failed to remove the record',
        //  'msg' => $e->getMessage()
        ];
        return response($json);
      }
    }
}
