@extends('../layout/' . $layout)

@push('judul', 'Kelola Mata Pelajaran')
@push('breadcrumb', 'Kelola Mata Pelajaran')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $judulcrud }}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a type="button" href="{{ route('kelola.mata_pelajaran.tambah') }}" class="btn btn-primary shadow-md mr-2">Tambah
                Mata Pelajaran</a>
        </div>
    </div>
    <div class="intro-y box p-5 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="flex flex-col sm:flex-row sm:items-end xl:items-start mb-6">
                <form name="cari" id="cari" method="get" action="{{ route('kelola.mata_pelajaran.cari') }}" class="xl:flex sm:mr-auto">
                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                        <label class="w-12 flex-none xl:w-auto mr-2">Kelas</label>
                        <select data-placeholder="Cari Kelas" name="kelas" class="tom-select w-full"
                                id="kelas">
                            @foreach($data_kelas as $list)
                                <option @if (Request::get('kelas') == $list->id)
                                        selected="selected"
                                        @endif value="{{ $list->id }}">{{ $list->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 xl:mt-0">
                        <button id="tabulator-html-filter-go" type="submit" class="btn btn-primary w-full sm:w-16">Cari</button>
                    </div>
                </form>
            </div>
            <table id="table" class="table table-report yajra-datatable -mt-2">
                <thead class="text-center">
                <tr>
                    <th class="whitespace-nowrap">NO</th>
                    <th class="whitespace-nowrap">NAMA MATA PELAJARAN</th>
                    <th class="whitespace-nowrap">KELAS</th>
                    <th class="whitespace-nowrap">AKSI</th>
                </tr>
                </thead>
                <tbody class="text-center whitespace-nowrap">
                @foreach($data_mapel as $list)
                    <tr class="intro-x">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $list->nama_mapel }}</td>
                        <td>{{ $list->kelas->nama_kelas }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('kelola.mata_pelajaran') }}/edit/{{ $list->id }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-21"
                                   href="{{ route('kelola.mata_pelajaran') }}/hapus/{{ $list->id }}"
                                   onclick="return confirm('Yakin Mau Dihapus?');">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
