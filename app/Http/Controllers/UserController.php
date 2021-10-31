<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // Nilai tetap
        $judulcrud = 'Data User';

        // Get Data
        $data = User::get();

        return view('kelola.user.index', [
            'data' => $data,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah User';

        return view('kelola.user.tambah', [
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indexedit(int $id)
    {
        // Ambil Data User
        $data = User::find($id);

        // Nilai tetap
        $judulcrud = 'Edit User';

        return view('kelola.user.edit', [
            'judulcrud' => $judulcrud,
            'data' => $data,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_username = $request->input('username');
        $get_nama = $request->input('nama');
        $get_level = Crypt::decrypt($request->input('level'));
        $get_password = bcrypt($request->input('password'));

        $data = new User;
        $data->username = $get_username;
        $data->nama = $get_nama;
        $data->level = $get_level;
        $data->password = $get_password;
        $data->save();

        // Menambah Peran User
        if ($get_level === 'Super Admin') {
            $data->assignRole('super_admin');
        } elseif ($get_level === 'Admin') {
            $data->assignRole('admin');
        }

        return response()->json(['success' => true]);
    }

    public function edit(Request $request, int $id)
    {
        // Get Data User
        $data = User::find($id);

        // Get Request
        $get_username = $request->input('username');
        $get_nama = $request->input('nama');
        $get_level = Crypt::decrypt($request->input('level'));

        $data->username = $get_username;
        $data->nama = $get_nama;
        $data->level = $get_level;
        if ($request->input('password') !== $data->password) {
            $get_password = bcrypt($request->input('password'));
            $data->password = $get_password;
        }
        $data->save();

        // Menambah Peran User
        if ($get_level === 'Super Admin') {
            $data->assignRole('super_admin');
        } elseif ($get_level === 'Admin') {
            $data->assignRole('admin');
        }

        return response()->json(['success' => true]);
    }

    public function hapus(int $id)
    {
        $siswa = Siswa::where('user_id', $id)->first();
        if (isset($siswa)) {
            $siswa->delete();
        }
        User::find($id)->delete();

        return redirect()->route('kelola.user');
    }

    public function cekusername(Request $request)
    {
        if ($request->input('username') !== '') {
            if ($request->input('username')) {
                $rule = array('username' => 'required|unique:users');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
    }

    public function cekusernameedit(Request $request, int $id)
    {
        // Get Data User
        $data = User::find($id);

        if ($request->input('username') === $data->username) {
            if ($request->input('username')) {
                $rule = array('username' => 'required');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        } elseif ($request->input('username') !== $data->username) {
            if ($request->input('username')) {
                $rule = array('username' => 'required|unique:users');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
    }
}
