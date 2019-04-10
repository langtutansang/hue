<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\User;

class UserController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'user', User::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::all(),
        ];
    }

    public function destroy($id)
    {   
        $result = $this->model::find($id)->delete();

        return ($result? 1 : 0);
    }

}
