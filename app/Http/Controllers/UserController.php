<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     // Praktikum 2.7
    //     $user = UserModel::with('level')->get();

    //     return view('user',['data' => $user]);


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

    // $user = UserModel::firstOrNew(
    //     [
    //         'username' => 'manager33',
    //         'nama' => 'Manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );
    // $user->save();

    // return view('user', ['data' => $user]);

    // Praktikum 2.5
    // $user = UserModel::create([
    //     'username' => 'manager55',
    //     'nama' => 'Manager55',
    //     'password' => hash::make('12345'),
    //     'level_id' => 2,
    // ]);

    // $user->username = 'manager55';

    // $user->isDirty(); // true
    // $user->isDirty('username'); // true
    // $user->isDirty('nama'); // false
    // $user->isDirty(['nama','username']); // true

    // $user->isClean(); // true
    // $user->isClean('username'); // true
    // $user->isClean('nama'); // false
    // $user->isClean(['nama','username']); // true

    // $user->save();

    // $user->isDirty(); // false
    // $user->isClean(); // true
    // dd($user->isDirty());

    // $user = UserModel::Create(
    //     [
    //         'username' => 'manager11',
    //         'nama' => 'Manager11',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]);

    //     $user->username = 'manager12';

    //     $user->save();

    //     $user->wasChanged(); // true
    //     $user->wasChanged('username'); // true
    //     $user->wasChanged(['username','level_id']); // true
    //     $user->wasChanged('nama'); // false
    //     dd($user->wasChanged(['username','level_id'])); // true

    // Praktikum 2.6
    // $user = UserModel::all();
    // return view('user',['data' => $user]);
    // }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

    // FormUser
    public function formUser()
    {
        return view('user.formUser');
    }

    // formLevel
    public function formLevel()
    {
        return view('user.formLevel');
    }

    // JS7 Prak 3 no 4
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        // JS7 Prak 4
        $level = LevelModel::all();     //ambil data level untuk filter level
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // JS7 Prak 3 no 7
    // Ambil data user dalam bentuk json untuk datatables 
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');

        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn()  //menambahkan kolom index/ no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) {
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) //memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    // JS7 Prak 3 no 8
    // menampilkan halamanan form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list'  => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all();
        $activeMenu = 'user';

        return view(
            'user.create',
            [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'level' => $level,
                'activeMenu' => $activeMenu
            ]
        );
    }

    // JS7 Prak 3 no 11
    // menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            //Username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik ditabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama'     => 'required|string|max:100',        //nama harus diisi, berupa string, da maksimal 100 karakter
            'password' => 'required|min:5',                 //password harus diisi dan minimal 5 katakter
            'level_id' => 'required|integer'                // level_id harus diisi dan berupa angka
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => bcrypt($request->password),       //password dienkipsi sebelum disimpan
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // JS7 Prak 3 no 14
    //Menampilkan detail User
    public function show(String $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list'  => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail User'
        ];

        $activeMenu = 'user';       //set menu yang sedang aktif
        return view(
            'user.show',
            [
                'breadcrumb' => $breadcrumb,
                'page'       => $page,
                'user'       => $user,
                'activeMenu' => $activeMenu
            ]
        );
    }

    // JS7 Prak 3 no 18
    // Menampilkan halaman form edit data
    public function edit(String $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list'  => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.edit', [
            'user' => $user,
            'level' => $level,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    //Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            //username harus didisi, berupa string, minimal 3 karakter,
            //dan bernilai unik ditabel m_users kolom user kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username, ' . $id . ',user_id',
            'nama'     => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    //Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {      //untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);    //Hapus data level

            return redirect('/user')->with('seccess', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            //Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkai dengan data ini');
        }
    }
}
