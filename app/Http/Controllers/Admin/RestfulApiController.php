<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestfulApiController extends Controller
{
    public  $view;
    public  $model;
    
    public function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
        $this->middleware('auth:admin')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return response()->json([ 'data' => View("admin.$this->view.create")->render()]);
    }
    public function index()
    {
        $params =  [
            'breadcrumb' => [$this->view],
            'title' => $this->view,
            'model' => $this->model::all()
        ];
        $params = array_merge( $params, $this->buildInputVarIndex());
        return view( "admin.$this->view.index",$params );
    }
    public function buildInputVarIndex(){
        return [];
    }

    public function store(Request $request)
    {
        $class = new $this->model;
        foreach($request->all() as $key => $field){
            $class[$key] = $field;
        }
        $class->id = NULL;
        $class->save();        
        return response()->json([ 'data' => View("admin.$this->view.item", ['row' => $class ])->render(), 'status'=> 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row ])->render(), 'status'=> 200]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result =$this->model::where('id', $id)->update($request->all());
        if($result != 1) return response()->json(['status' => 500]);
        $row = $this->model::find($id);
        return response()->json([ 'data' => View("admin.$this->view.item", ['row' => $this->model::find($id),'key' =>1 ])->render(), 'status'=> 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        return $this->model::where('id', $id)
        ->update(['deleted' => 1]);
    }
}