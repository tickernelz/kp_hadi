<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        // Nilai tetap
        $judulcrud = 'Data Mata Pelajaran';

        // Get Data
        $data_mapel = MataPelajaran::with('kelas')->get();
        $data_kelas = Kelas::get();

        return view('kelola.mata_pelajaran.index', [
            'data_kelas' => $data_kelas,
            'data_mapel' => $data_mapel,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indexcari(Request $request)
    {
        // Nilai tetap
        $judulcrud = 'Data Mata Pelajaran';

        // Get Request
        $kelas = $request->input('kelas');

        // Get Data
        $data_mapel = MataPelajaran::with('kelas')->where('kelas_id', $kelas)->get();
        $data_kelas = Kelas::get();

        return view('kelola.mata_pelajaran.index', [
            'data_kelas' => $data_kelas,
            'data_mapel' => $data_mapel,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah Mata Pelajaran';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.mata_pelajaran.tambah', [
            'judulcrud' => $judulcrud,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function indexedit(int $id)
    {
        // Ambil Data Mata Pelajaran
        $data = MataPelajaran::with('kelas')->find($id);

        // Nilai tetap
        $judulcrud = 'Edit Mata Pelajaran';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.mata_pelajaran.edit', [
            'judulcrud' => $judulcrud,
            'data' => $data,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_nama_mapel = $request->input('nama_mapel');
        $get_kelas = $request->input('kelas');

        $data = new MataPelajaran;
        $data->nama_mapel = $get_nama_mapel;
        $data->kelas_id = $get_kelas;
        $data->save();

        return response()->json(['success' => true]);
    }

    public function edit(Request $request, int $id)
    {
        // Get Data User
        $data = MataPelajaran::where('id', $id)->first();

        // Get Request
        $get_nama_mapel = $request->input('nama_mapel');
        $get_kelas = $request->input('kelas');

        $data->nama_mapel = $get_nama_mapel;
        $data->kelas_id = $get_kelas;
        $data->save();

        return response()->json(['success' => true]);
    }

    public function hapus(int $id)
    {
        MataPelajaran::find($id)->delete();

        return redirect()->route('kelola.mata_pelajaran');
    }
}
