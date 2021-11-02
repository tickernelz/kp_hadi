@extends('../layout/' . $layout)

@push('judul', 'Kelola Kelompok Nilai')
@push('breadcrumb', 'Kelola Kelompok Nilai')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $judulcrud }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a type="button" href="{{ route('kelola.kelompok_nilai.tambah') }}" class="btn btn-primary shadow-md mr-2">Tambah
                Kelompok Nilai</a>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row items-center justify-center mt-4 mb-6">
        <div class="intro-y box h-auto w-2/6 p-6">
            @if(session()->get('error'))
                <div class="alert alert-outline-danger alert-dismissible show flex items-center mb-2" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif
            <form action="{{ route('kelola.kelompok_nilai.cari') }}" method="get">
                <div class="mt-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select data-placeholder="Pilih Kelas" name="kelas" class="tom-select w-full mb-3" id="kelas">
                        @foreach($data_kelas as $list)
                            <option value="{{ $list->id }}">{{ $list->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary shadow-md md:w-full mt-4">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <table id="table" class="table table-report yajra-datatable mt-4">
        <thead class="text-center">
        <tr>
            <th class="whitespace-nowrap">NO</th>
            <th class="whitespace-nowrap">KELAS</th>
            <th class="whitespace-nowrap">NAMA PENILAIAN</th>
            <th class="whitespace-nowrap">AKSI</th>
        </tr>
        </thead>
        <tbody class="text-center whitespace-nowrap">
        @foreach ($data_kelompok as $list)
            <tr class="intro-x">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $list->kelas->nama_kelas }}</td>
                <td>{{ $list->nama_kelompok }}</td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3"
                           href="{{ route('kelola.kelompok_nilai') }}/edit/{{ $list->id }}">
                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                        </a>
                        <a class="flex items-center text-theme-21"
                           href="{{ route('kelola.kelompok_nilai') }}/hapus/{{ $list->id }}"
                           onclick="return confirm('Yakin Mau Dihapus?');">
                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
