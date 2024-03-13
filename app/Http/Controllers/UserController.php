<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $user = UserModel::all();
        // return view('user',['data' => $user]);

        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username','customer-1')->update($data);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager-2',
        //     'nama' => 'Manager',
        //     'password' => Hash::make('12345'),
        // ];
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga2',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user',['data' => $user]);

        // PRAKTIKUM 2
        // $user = UserModel::find(1);
        // $user = UserModel::where('level_id',3)->first();
        // return view('user',['data' => $user]);

        // $user = UserModel::firstWhere('level_id',1);
        // return view('user',['data' => $user]);

        // $user = UserModel::findOr(1,['username','nama'], function (){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);
        // $user = UserModel::findOr(20,['username','nama'], function (){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        // praktikum 2.2
        // $user = UserModel::findOrFail(1);
        // return view('user',['data' => $user]);
        // $user = UserModel::where('username','manager9')->firstOrFail();
        // return view('user',['data' => $user]);

        // Praktikum 2.3
        // $user = UserModel::where('level_id',2)->count();
        // dd($user);
        // return view('user',['data' => $user]);

        // Praktikum 2.4
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ]
        //     );
        //     return view('user', ['data' => $user]);
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ]
        //     );
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );
        // return view('user', ['data' => $user]);

        $user = UserModel::firstOrNew(
            [
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user->save();

        return view('user', ['data' => $user]);
    }

}
