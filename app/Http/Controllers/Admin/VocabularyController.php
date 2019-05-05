<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Vocabulary;
use App\Lesson;

use Ixudra\Curl\Facades\Curl;
class VocabularyController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'vocabulary', Vocabulary::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function transText($data)
    {
        $response = Curl::to("https://dict.laban.vn/ajax/widget-search?type=1&query=$data&vi=0")

        ->get();
        return response($response)->withHeaders([
            'Content-Encoding' => 'gzip',
            'Content-Type'  => 'application/json;charset=UTF-8'
        ]);
    }

    public function getAudio($data)
    {
        $response = Curl::to("https://dict.laban.vn/ajax/getsound?accent=us&word=$data")
        ->get();
        return response($response)->withHeaders([
            'Content-Encoding' => 'gzip',
            'Content-Type'  => 'application/json;charset=UTF-8'
        ]);
    }
    public function store(Request $request)
    {
        $class = new $this->model;
        foreach($request->all() as $key => $field){
            $class[$key] = $field;
        }
        $class->id = NULL;
        $class->save();        

        return response()->json([ 'status'=> 200, 'data' => $class]);
    }


}
