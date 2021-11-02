@extends('../layout/' . $layout)

@push('judul', 'Kelola Nilai')
@push('breadcrumb', 'Kelola Nilai')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $judulcrud }}</h2>
    </div>
    <div class="flex flex-col sm:flex-row items-center justify-center mt-4 mb-12">
        <div class="intro-y box h-auto w-2/6 p-6">
            @if(session()->get('update'))
                <div class="alert alert-outline-success alert-dismissible show flex items-center mb-4" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session()->get('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif
            @if(session()->get('error'))
                <div class="alert alert-outline-danger alert-dismissible show flex items-center mb-2" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif
            @if(session()->get('create'))
                <div class="alert alert-outline-primary alert-dismissible show flex items-center mb-4" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session()->get('create') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif
            <form action="{{ route('kelola.nilai.cari') }}" method="get">
                <div class="mt-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <select data-placeholder="Pilih Mata Pelajaran" name="mata_pelajaran" class="tom-select w-full mb-3"
                            id="mata_pelajaran">
                        @foreach($data_mapel as $list)
                            <option value="{{ $list->id }}">{{ $list->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
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
        <form method="POST" action="{{route('kelola.nilai.tambah.post')}}">
            @csrf
            <input name="tahun_ajaran" type="hidden"
                   value="{{ Request::get('tahun_ajaran') }}">
            <input name="semester" type="hidden"
                   value="{{ Request::get('semester') }}">
            <input name="mata_pelajaran" type="hidden"
                   value="{{ Request::get('mata_pelajaran') }}">
            <input name="kelas" type="hidden"
                   value="{{ Request::get('kelas') }}">
            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row items-center border-b border-gray-200 dark:border-dark-5 mb-4">
                    <h2 class="font-medium text-base mr-auto">Tabel</h2>
                    <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                    </div>
                </div>
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table id="table" class="table table-report yajra-datatable mt-4">
                        <thead class="text-center">
                        <tr>
                            <th class="whitespace-nowrap">NO</th>
                            <th class="whitespace-nowrap">NIS</th>
                            <th class="whitespace-nowrap">SISWA</th>
                            @foreach($data_kelompok as $list)
                                <th class="whitespace-nowrap">{{ $list->nama_kelompok }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody class="text-center whitespace-nowrap">
                        @foreach ($data_siswa as $list1)
                            @php
                                $number1 = $loop->iteration - 1
                            @endphp
                            <tr class="intro-x">
                                <td>{{ $loop->iteration }}</td>
                                <input name="siswa_id[]" type="hidden"
                                       value="{{ $list1->id }}">
                                <td>{{ $list1->nis }}</td>
                                <td>{{ $list1->user->nama }}</td>
                                @foreach ($data_kelompok as $list2)
                                    @php
                                        $number2 = $loop->iteration - 1
                                    @endphp
                                    @if(empty($list2->id))
                                        <td class="text-center"></td>
                                    @else
                                        <td class="text-center">
                                            <input name="kelompok[{{$number1}}][{{$number2}}]" type="hidden"
                                                   value="{{ $list2->id }}">
                                            <input type="hidden"
                                                   name="nilai-ori[{{$number1}}][{{$number2}}]"
                                                   value="{{ \App\Models\Nilai::where([
                                                            ['siswa_id', '=', $list1->id],
                                                            ['kelompok_nilai_id', '=', $list2->id],
                                                            ['mata_pelajaran_id', '=', Request::get('mata_pelajaran')],
                                                            ['tahun_ajaran_id', '=', Request::get('tahun_ajaran')],
                                                            ['semester', '=', Request::get('semester')],
                                                        ])->value('nilai')}}"
                                                   class="form-control">
                                            <input type="text" name="nilai[{{$number1}}][{{$number2}}]"
                                                   value="{{ \App\Models\Nilai::where([
                                                            ['siswa_id', '=', $list1->id],
                                                            ['kelompok_nilai_id', '=', $list2->id],
                                                            ['mata_pelajaran_id', '=', Request::get('mata_pelajaran')],
                                                            ['tahun_ajaran_id', '=', Request::get('tahun_ajaran')],
                                                            ['semester', '=', Request::get('semester')],
                                                        ])->value('nilai')}}"
                                                   class="form-control w-auto"
                                                   placeholder="Isi Nilai">
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    @endif

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
