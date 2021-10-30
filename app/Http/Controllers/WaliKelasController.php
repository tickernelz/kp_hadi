<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WaliKelasController extends Controller
{
    public function index()
    {
        // Nilai tetap
        $judulcrud = 'Data Wali Kelas';

        // Get Data
        $data_wali_kelas = WaliKelas::with('user', 'kelas')->get();
        $data_kelas = Kelas::get();

        return view('kelola.wali_kelas.index', [
            'data_kelas' => $data_kelas,
            'data_wali_kelas' => $data_wali_kelas,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indexcari(Request $request)
    {
        // Nilai tetap
        $judulcrud = 'Data Wali Kelas';

        // Get Request
        $kelas = $request->input('kelas');

        // Get Data
        $data_wali_kelas = WaliKelas::with('user', 'kelas')->where('kelas_id', $kelas)->get();
        $data_kelas = Kelas::get();

        return view('kelola.wali_kelas.index', [
            'data_kelas' => $data_kelas,
            'data_wali_kelas' => $data_wali_kelas,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah Wali Kelas';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.wali_kelas.tambah', [
            'judulcrud' => $judulcrud,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function indexedit(int $id)
    {
        // Ambil Data Wali Kelas
        $data = WaliKelas::with('user', 'kelas')->find($id);

        // Nilai tetap
        $judulcrud = 'Edit Wali Kelas';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.wali_kelas.edit', [
            'judulcrud' => $judulcrud,
            'data' => $data,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_nip = $request->input('nip');
        $get_username = $request->input('username');
        $get_nama = $request->input('nama');
        $get_kelas = $request->input('kelas');
        $get_level = 'Wali Kelas';
        $get_password = bcrypt($request->input('password'));

        $data_user = new User;
        $data_user->username = $get_username;
        $data_user->nama = $get_nama;
        $data_user->level = $get_level;
        $data_user->password = $get_password;
        $data_user->save();
        $data_user->assignRole('wali_kelas');

        $data_wali_kelas = new WaliKelas;
        $data_wali_kelas->nip = $get_nip;
        $data_wali_kelas->kelas_id = $get_kelas;
        $data_wali_kelas->user()->associate($data_user);
        $data_wali_kelas->save();

        return response()->json(['success' => true]);
    }

    public function edit(Request $request, int $id)
    {
        // Get Data User
        $data = WaliKelas::with('user')->where('id', $id)->first();

        // Get Request
        $get_nip = $request->input('nip');
        $get_username = $request->input('username');
        $get_nama = $request->input('nama');
        $get_kelas = $request->input('kelas');

        $data->nip = $get_nip;
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
        WaliKelas::where('user_id', $id)->delete();
        User::find($id)->delete();

        return redirect()->route('kelola.wali_kelas');
    }

    public function cekniptambah(Request $request)
    {
        if ($request->input('nip') !== '') {
            if ($request->input('nip')) {
                $rule = array('nip' => 'required|unique:wali_kelas');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
    }

    public function ceknipedit(Request $request, int $id)
    {
        // Get Data User
        $data = WaliKelas::with('user')->find($id);

        if ($request->input('nip') === $data->nip) {
            if ($request->input('nip')) {
                $rule = array('nip' => 'required');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        } elseif ($request->input('nip') !== $data->nip) {
            if ($request->input('nip')) {
                $rule = array('nip' => 'required|unique:wali_kelas');
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
        $data = WaliKelas::with('user')->find($id);

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
