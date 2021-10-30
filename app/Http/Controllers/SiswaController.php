<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        // Nilai tetap
        $judulcrud = 'Data Siswa';

        // Get Data
        $data_siswa = Siswa::with('user', 'kelas')->get();
        $data_kelas = Kelas::get();

        return view('kelola.siswa.index', [
            'data_kelas' => $data_kelas,
            'data_siswa' => $data_siswa,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indexcari(Request $request)
    {
        // Nilai tetap
        $judulcrud = 'Data Siswa';

        // Get Request
        $kelas = $request->input('kelas');

        // Get Data
        $data_siswa = Siswa::with('user', 'kelas')->where('kelas_id', $kelas)->get();
        $data_kelas = Kelas::get();

        return view('kelola.siswa.index', [
            'data_kelas' => $data_kelas,
            'data_siswa' => $data_siswa,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah Siswa';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.siswa.tambah', [
            'judulcrud' => $judulcrud,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function indexedit(int $id)
    {
        // Ambil Data Siswa
        $data = Siswa::with('user', 'kelas')->find($id);

        // Nilai tetap
        $judulcrud = 'Edit Siswa';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.siswa.edit', [
            'judulcrud' => $judulcrud,
            'data' => $data,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_nis = $request->input('nis');
        $get_username = $request->input('username');
        $get_nama = $request->input('nama');
        $get_kelas = $request->input('kelas');
        $get_level = 'Siswa';
        $get_password = bcrypt($request->input('password'));

        $data_user = new User;
        $data_user->username = $get_username;
        $data_user->nama = $get_nama;
        $data_user->level = $get_level;
        $data_user->password = $get_password;
        $data_user->save();
        $data_user->assignRole('siswa');

        $data_siswa = new Siswa;
        $data_siswa->nis = $get_nis;
        $data_siswa->kelas_id = $get_kelas;
        $data_siswa->user()->associate($data_user);
        $data_siswa->save();

        return response()->json(['success' => true]);
    }

    public function edit(Request $request, int $id)
    {
        // Get Data User
        $data = Siswa::with('user')->where('id', $id)->first();

        // Get Request
        $get_nis = $request->input('nis');
        $get_username = $request->input('username');
        $get_nama = $request->input('nama');
        $get_kelas = $request->input('kelas');

        $data->nis = $get_nis;
        $data->kelas_id = $get_kelas;
        $data->user->username = $get_username;
        $data->user->nama = $get_nama;
        if ($request->input('password') !== $data->user->password) {
            $get_password = bcrypt($request->input('password'));
            $data->user->password = $get_password;
        }
        $data->save();

        return response()->json(['success' => true]);
    }

    public function hapus(int $id)
    {
        Siswa::where('user_id', $id)->delete();
        User::find($id)->delete();

        return redirect()->route('kelola.siswa');
    }

    public function ceknistambah(Request $request)
    {
        if ($request->input('nis') !== '') {
            if ($request->input('nis')) {
                $rule = array('nis' => 'required|unique:siswas');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
    }

    public function ceknisedit(Request $request, int $id)
    {
        // Get Data User
        $data = Siswa::with('user')->find($id);

        if ($request->input('nis') === $data->nis) {
            if ($request->input('nis')) {
                $rule = array('nis' => 'required');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        } elseif ($request->input('nis') !== $data->nis) {
            if ($request->input('nis')) {
                $rule = array('nis' => 'required|unique:users');
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
        $data = Siswa::with('user')->find($id);

        if ($request->input('username') === $data->user->username) {
            if ($request->input('username')) {
                $rule = array('username' => 'required');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        } elseif ($request->input('username') !== $data->user->username) {
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
