<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Http\Requests\ProductValidate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidate $request)
    {
      try {
        $oProduct = new Products();
        $oProduct->name = $request->name;
        $oProduct->category = $request->category;
        $oProduct->price = $request->price;
        $oProduct->created_at = date('Y-m-d H:i:s');
        $oProduct->save();
        $json = [
          'status'=>true,
          'id'=>$oProduct->id,
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
      $oProduct = Products::find($id);
      return $oProduct;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductValidate $request, $id)
    {
      try{
        $oProduct = Products::find($id);
        $oProduct->name = $request->name;
        $oProduct->category = $request->category;
        $oProduct->price = $request->price;
        $oProduct->updated_at = date('Y-m-d H:i:s');
        $oProduct->save();
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
        $oProduct = Products::find($id);
        $oProduct->delete();
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
