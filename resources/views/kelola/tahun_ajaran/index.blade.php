@extends('../layout/' . $layout)

@push('judul', 'Kelola Tahun Ajaran')
@push('breadcrumb', 'Kelola Tahun Ajaran')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">{{ $judulcrud }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a type="button" href="{{ route('kelola.tahun_ajaran.tambah') }}" class="btn btn-primary shadow-md mr-2">Tambah Tahun Ajaran</a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="table" class="table table-report yajra-datatable -mt-2">
                <thead class="text-center">
                <tr>
                    <th class="whitespace-nowrap">NO</th>
                    <th class="whitespace-nowrap">TAHUN AJARAN</th>
                    <th class="whitespace-nowrap">AKSI</th>
                </tr>
                </thead>
                <tbody class="text-center whitespace-nowrap">
                @foreach($data as $list)
                    <tr class="intro-x">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $list->tahun }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-theme-21" href="{{ Request::url() }}/hapus/{{ $list->id }}" onclick="return confirm('Yakin Mau Dihapus?');">
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
