@extends('../layout/' . $layout)

@push('judul', 'Penilaian Hasil Belajar')
@push('breadcrumb', 'Penilaian Hasil Belajar')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $judulcrud }}</h2>
    </div>
    <div class="flex flex-col sm:flex-row items-center justify-center mt-4 mb-12">
        <div class="intro-y box h-auto w-2/6 p-6">
            @if(session()->get('error'))
                <div class="alert alert-outline-danger alert-dismissible show flex items-center mb-2" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif
            <form action="{{ route('siswa.nilai.cari') }}" method="get">
                <div class="mt-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select data-placeholder="Pilih Kelas" name="kelas" class="tom-select w-full mb-3" id="kelas">
                        @foreach($data_kelas as $list)
                            <option value="{{ $list->id }}">{{ $list->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <select data-placeholder="Pilih Tahun Ajaran" name="tahun_ajaran" class="tom-select w-full mb-3"
                            id="tahun_ajaran">
                        @foreach($data_tahun as $list)
                            <option value="{{ $list->id }}">{{ $list->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="semester" class="form-label">Semester</label>
                    <select data-placeholder="Pilih Semester" name="semester" class="tom-select w-full mb-3"
                            id="semester">
                        <option value="ganjil">Ganjil</option>
                        <option value="genap">Genap</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary shadow-md md:w-full mt-4">Cari</button>
                </div>
            </form>
        </div>
    </div>
    @if($cari === true)
        <div class="intro-y box p-5 mt-5">
            <div class="flex flex-col sm:flex-row items-center border-b border-gray-200 dark:border-dark-5 mb-4">
                <h2 class="font-medium text-base mr-auto">Tabel</h2>
            </div>
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table id="table" class="table table-report yajra-datatable mt-4">
                    <thead class="text-center">
                    <tr>
                        <th class="whitespace-nowrap">MATA PELAJARAN</th>
                        @foreach($data_kelompok as $list)
                            <th class="whitespace-nowrap">{{ $list->nama_kelompok }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="text-center whitespace-nowrap">
                    @foreach ($data_mapel as $list1)
                        <tr class="intro-x">
                            <td>{{ $list1->nama_mapel }}</td>
                            @php
                                $data_nilai = \App\Models\Nilai::with(['kelompok_nilai' => function ($query) {
                                    $query->select('nama_kelompok')->groupBy('nama_kelompok');
                                        }], 'siswa', 'tahun_ajaran', 'mata_pelajaran')
                                        ->whereIn('kelompok_nilai_id', $data_kelompok_array)
                                        ->whereRaw("mata_pelajaran_id = '$list1->id' AND siswa_id = '$siswa->id' AND tahun_ajaran_id = '$tahun_ajaran' AND semester = '$semester'")
                                        ->get();
                            @endphp
                            @foreach ($data_nilai as $list2)
                                <td>{{ $list2->nilai }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
