<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Auth;
use Validator;

class FormController extends Controller
{


    public function index(){

        if(!Auth::check()){
            return response([
                'message' => 'unauthenticated',
            ], 401);
        }

        $form = Form::all(['id','name','slug','description','limit_one_response','creator_id']);
        return response([
            'message' =>  'Get all form success',
            'form' => [
                $form
                // 'id' => $form->id,
                // 'name' => $form->name,
                // 'slug' => $form->slug,
                // 'description' => $form->description,
                // 'limit_one_response' => $form->limit_one_response,
                // 'creator_id' => $form->creator_id,
            ],
        ]);
    }

    public function store(Request $request){
        //mengecek apakah ada user yang login
        if(!Auth::check()){
            return response([
                'message' => 'unauthenticated'
            ], 401);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:forms',
        ]);

        if($validator->fails()){
            return response([
                'message' => 'invalid field',
                'errors' => $validator->messages(),
            ], 422);
        }

        Form::create(Request(['name','slug','allowed_domain','description','limit_one_response']));
        $getForm = Form::where('slug', $request->slug)->first();

        return response([
            'message' => 'create form success',
            'form' => [
                'name' => $getForm->name,
                'slug' => $getForm->slug,
                'description' => $getForm->description,
                'limit_one_response' => $getForm->limit_one_response,

                //mengambil id user yang sedang login
                'creator_id' => Auth::user()->id,
                'id' => $getForm->id
            ]
            ]);
    }
}
