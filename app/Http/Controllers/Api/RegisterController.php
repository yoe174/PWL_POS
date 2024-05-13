<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Handle the user uploaded file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $hashedName = $image->hashName();
            $path = $image->storeAs('public/posts', $hashedName);
        }
        
        //create user
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            // 'image' => $request->image
            // 'image' => $image->hashName(),
            'image' => $hashedName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }
        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}
