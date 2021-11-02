<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelompokNilai;
use Illuminate\Http\Request;
use Session;

class KelompokNilaiController extends Controller
{
    public function index()
    {
        if(Session::get('error') === null)
        {
            //Clear Session
            Session::forget('error');
        }

        //Get Session
        $error = Session::get('error');

        // Nilai tetap
        $judulcrud = 'Cari Kelompok Nilai';

        // Get Data
        $data_kelas = Kelas::get();
        $data_kelompok = KelompokNilai::with('kelas')->get();

        return view('kelola.kelompok_nilai.index', [
            'error' => $error,
            'data_kelompok' => $data_kelompok,
            'data_kelas' => $data_kelas,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indexcari(Request $request)
    {
        // Nilai tetap
        $judulcrud = 'Data Kelompok Nilai';

        // Get Request
        $kelas = $request->input('kelas');

        // Get Data
        $data_kelas = Kelas::get();
        $data_kelompok = KelompokNilai::with('kelas')->whereRaw("kelas_id = '$kelas'")->get();
        Session::forget('error');
        if($data_kelompok->isEmpty()){
            Session::flash('error', 'Data Tidak Ditemukan!');
            return redirect(route('kelola.kelompok_nilai'));
        }

        return view('kelola.kelompok_nilai.index', [
            'data_kelompok' => $data_kelompok,
            'data_kelas' => $data_kelas,
            'judulcrud' => $judulcrud,
        ]);
    }

    public function indextambah()
    {
        // Nilai tetap
        $judulcrud = 'Tambah Kelompok Nilai';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.kelompok_nilai.tambah', [
            'judulcrud' => $judulcrud,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function indexedit(int $id)
    {
        // Ambil Data Kelompok Nilai
        $data = KelompokNilai::with('mata_pelajaran')->find($id);

        // Nilai tetap
        $judulcrud = 'Edit Kelompok Nilai';

        // Get Data
        $data_kelas = Kelas::get();

        return view('kelola.kelompok_nilai.edit', [
            'judulcrud' => $judulcrud,
            'data' => $data,
            'data_kelas' => $data_kelas,
        ]);
    }

    public function tambah(Request $request)
    {
        // Get Request
        $get_kelas = $request->input('kelas');
        $get_nama_kelompok = $request->input('nama_kelompok');

        $data = new KelompokNilai();
        $data->kelas_id = $get_kelas;
        $data->nama_kelompok = $get_nama_kelompok;
        $data->save();

        return response()->json(['success' => true]);
    }

    public function edit(Request $request, int $id)
    {
        // Get Data User
        $data = KelompokNilai::find($id);

        // Get Request
        $get_kelas = $request->input('kelas');
        $get_nama_kelompok = $request->input('nama_kelompok');

        $data->kelas_id = $get_kelas;
        $data->nama_kelompok = $get_nama_kelompok;
        $data->save();

        return response()->json(['success' => true]);
    }

    public function hapus(int $id)
    {
        KelompokNilai::find($id)->delete();

        return redirect()->route('kelola.kelompok_nilai');
    }
}
