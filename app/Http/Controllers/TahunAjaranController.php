<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        // Nilai tetap
        $judulcrud = 'Data Tahun Ajaran';

        // Get Data
        $data = TahunAjaran::get();

        return view('kelola.tahun_ajaran.index', [
            'data' => $data,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah Tahun Ajaran';

        return view('kelola.tahun_ajaran.tambah', [
            'judulcrud' => $judulcrud,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_tahun = $request->input('tahun');

        $data = new TahunAjaran;
        $data->tahun = $get_tahun;
        $data->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function hapus(int $id)
    {
        TahunAjaran::find($id)->delete();

        return redirect()->route('kelola.tahun_ajaran');
    }
}
