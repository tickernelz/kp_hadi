<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelompokNilai;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\WaliKelas;
use Auth;
use Illuminate\Http\Request;
use Session;

class NilaiController extends Controller
{
    public function index()
    {
        // Session
        Session::get('error');

        // Nilai tetap
        $judulcrud = 'Cari Nilai';
        $cari = false;

        // Get Data
        $data_mapel = MataPelajaran::get();
        $data_kelas = Kelas::get();
        $data_tahun = TahunAjaran::get();

        return view('kelola.nilai.index', [
            'data_tahun' => $data_tahun,
            'data_kelas' => $data_kelas,
            'data_mapel' => $data_mapel,
            'judulcrud' => $judulcrud,
            'cari' => $cari,
        ]);
    }

    public function indexcari(Request $request)
    {
        // Nilai tetap
        $judulcrud = 'Data Nilai';
        $cari = true;

        // Get Request
        $mata_pelajaran = $request->input('mata_pelajaran');
        $kelas = $request->input('kelas');
        $tahun_ajaran = $request->input('tahun_ajaran');
        $semester = $request->input('semester');

        // Get Data
        $wali_kelas = WaliKelas::with('user', 'kelas')->whereRaw('user_id = ' . Auth::user()->id . ' AND kelas_id = ' . $kelas . '')->first();
        $data_mapel = MataPelajaran::get();
        $data_kelas = Kelas::get();
        $data_tahun = TahunAjaran::get();
        $data_siswa = Siswa::with('kelas', 'user')->where('kelas_id', $kelas)->get();
        $data_kelompok = KelompokNilai::with('kelas', 'mata_pelajaran')->whereRaw("kelas_id = '$kelas' AND mata_pelajaran_id = '$mata_pelajaran'")->get();
        $data_kelompok_array = $data_kelompok->pluck('id')->toArray();
        $data_nilai = Nilai::with('kelompok_nilai', 'siswa', 'tahun_ajaran')->whereIn('kelompok_nilai_id', $data_kelompok_array)->whereRaw("tahun_ajaran_id = '$tahun_ajaran' AND semester = '$semester'")->get();

        if (Auth::user()->hasAnyRole('super_admin|admin') | isset($wali_kelas)) {
            return view('kelola.nilai.index', [
                'data_mapel' => $data_mapel,
                'data_kelas' => $data_kelas,
                'data_tahun' => $data_tahun,
                'data_siswa' => $data_siswa,
                'data_kelompok' => $data_kelompok,
                'data_nilai' => $data_nilai,
                'judulcrud' => $judulcrud,
                'cari' => $cari,
            ]);
        }
        Session::flash('error', 'Anda Bukan Wali Kelas Dari Kelas Tersebut!');
        return back();
    }

    public function tambah(Request $request)
    {
        //Get Session
        Session::get('update');
        Session::get('create');

        // Get Request
        $tahun_ajaran = $request->input('tahun_ajaran');
        $semester = $request->input('semester');
        $siswa_id = $request->get('siswa_id');
        $kelompok = $request->get('kelompok');
        $nilaiori = $request->get('nilai-ori');
        $nilai = $request->get('nilai');

        $max_siswa = count($siswa_id);

        for ($x = 0; $x < $max_siswa; $x++) {
            $kelompok_by_siswa = $kelompok[$x];
            $max_kelompok = count($kelompok_by_siswa);
            for ($y = 0; $y < $max_kelompok; $y++) {
                $id_siswa_array = $siswa_id[$x];
                $id_kelompok_array = $kelompok[$x][$y];
                $nilai_array = $nilai[$x][$y];
                $nilaiori_array = $nilaiori[$x][$y];

                // Nilai
                $cek_nilai = Nilai::where([
                    ['siswa_id', '=', $id_siswa_array],
                    ['kelompok_nilai_id', '=', $id_kelompok_array],
                    ['tahun_ajaran_id', '=', $tahun_ajaran],
                    ['semester', '=', $semester],
                    ['nilai', '=', $nilaiori_array],
                ])->first();

                if (!is_null($cek_nilai)) {
                    $cek_nilai->update([
                        'nilai' => $nilai_array,
                    ]);
                    Session::flash('update', 'Data Diperbarui!');
                } else {
                    Nilai::create([
                        'siswa_id' => $id_siswa_array,
                        'kelompok_nilai_id' => $id_kelompok_array,
                        'tahun_ajaran_id' => $tahun_ajaran,
                        'semester' => $semester,
                        'nilai' => $nilai_array,
                    ]);
                    Session::flash('create', 'Data Berhasil Ditambahkan!');
                }
            }
        }
        return back();
    }
}
