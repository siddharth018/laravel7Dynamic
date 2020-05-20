<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TagList;
use Validator;

class HomeController extends Controller
{
    public function addMore()
    {
        return view("addMore");
    }

    public function addMorePost(Request $request)
    {
        $rules = [];

        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            foreach($request->input('name') as $key => $value) {
                TagList::create(['name'=>$value]);
            }
            
            return response()->json(['success'=>'done']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
