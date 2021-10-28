<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        // Nilai tetap
        $judulcrud = 'Data Kelas';

        // Get Data
        $data = Kelas::get();

        return view('kelola.kelas.index', [
            'data' => $data,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah Kelas';

        return view('kelola.kelas.tambah', [
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indexedit(int $id)
    {
        // Ambil Data Kelas
        $data = Kelas::find($id);

        // Nilai tetap
        $judulcrud = 'Edit Kelas';

        return view('kelola.kelas.edit', [
            'judulcrud' => $judulcrud,
            'data' => $data,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_kelas = $request->input('nama_kelas');

        $data = new Kelas;
        $data->nama_kelas = $get_kelas;
        $data->save();

        return response()->json(['success' => true]);
    }

    public function edit(Request $request, int $id)
    {
        // Get Data User
        $data = Kelas::find($id);

        // Get Request
        $data->nama_kelas = $request->input('nama_kelas');
        $data->save();

        return response()->json(['success' => true]);
    }

    public function hapus(int $id)
    {
        Kelas::find($id)->delete();

        return redirect()->route('kelola.kelas');
    }

    function cektambah(Request $request)
    {
        if ($request->input('nama_kelas') !== '') {
            if ($request->input('nama_kelas')) {
                $rule = array('nama_kelas' => 'required|unique:kelas');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
    }

    function cekedit(Request $request, int $id)
    {
        // Get Data User
        $data = Kelas::find($id);

        if ($request->input('nama_kelas') === $data->nama_kelas) {
            if ($request->input('nama_kelas')) {
                $rule = array('nama_kelas' => 'required');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
    }
}
