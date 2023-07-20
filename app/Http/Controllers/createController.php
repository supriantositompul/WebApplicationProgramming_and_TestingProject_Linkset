<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\links;

class createController extends Controller
{

    function createLink(Request $req)
    {
        $Links = new links();
        $Links->user_id = $req->user_id;
        $Links->name = $req->name;
        $Links->link = $req->link;
        $result = $Links->save();
        if ($result) {
            return response()->json([
                'type' => 'created',
                'message' => 'Link created successfully',
                'links' => $Links,
            ], 201);
        } else {
            return response()->json(
                [
                    'status' => false,

                ],
                400
            );
        }
    }

    /* function updateLink(Request $req)
    {
        $Links = links::find($req->id);
        $Links->user_id = $req->user_id;
        $Links->name = $req->name;
        $Links->link = $req->link;
        $result = $Links->save();
        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Update was successful',
                'links' => $Links,
            ], 200);
        } else  {
            return ['result' => 'Update operation has been failed'];
        }
    }
*/

     function testUpdateLink(Request $req)
    {
        $rules = [
            'name' => 'required|min:2|max:225 ',
            'link' => 'required|url',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'type' => 'Bad Request',
                    'error' => $validator->errors(),
                ],
                400
            );
        } else {
            $Links = new links();
            $Links->user_id = $req->user_id;
            $Links->name = $req->name;
            $Links->link = $req->link;
            $result = $Links->save();
            if ($result) {
                return response()->json([
                    'type' => 'OK',
                    'message' => 'Update was successful',
                    'links' => $Links,
                ], 200);
            } else {
                return ['result' => 'Update operation has been failed'];
            }
        }
    }

    function updateLink(Request $req)
    {
        $Links = links::find($req->id);
        $Links->user_id = $req->user_id;
        $Links->name = $req->name;
        $Links->link = $req->link;
        $result = $Links->save();
        if ($result) {
            return ['result' => 'Update was successful'];
        } else {
            return ['result' => 'Update operation has been failed'];
        }
    }
    function search($name)
    {
        return links::where('name', 'like', '%' . $name . '%')->get();
    }
    function deleteLink($id)
    {
        $Links = links::find($id);
        $result = $Links->delete();
        if ($result) {
            return [
                'type' => 'OK',
                'Result' => 'Deleted successfully with id ' . $id] ;
        } else {
            return ['Result' => 'Delete operation has been failed'];
        }
    }
    function testData(Request $req) //test created link
    {
        $rules = [
            'name' => 'required|min:2|max:225 ',
            'link' => 'required|url',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'type' => 'Bad Request',
                    'error' => $validator->errors(),
                ],
                400
            );
        } else {
            $Links = new links();
            $Links->user_id = $req->user_id;
            $Links->name = $req->name;
            $Links->link = $req->link;
            $result = $Links->save();
            if ($result) {
                return response()->json([
                    'type' => 'Created',
                    'message' => 'Link created successfully',
                    'links' => $Links,
                ], 201);
            } else {
                return ['Result' => 'Operation failed'];
            }
        }
    }
}
