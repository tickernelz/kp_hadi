@extends('../layout/' . $layout)

@push('judul', 'Edit Mata Pelajaran')
@push('breadcrumb', 'Edit Mata Pelajaran')

@section('subcontent')

    <!-- BEGIN: Success Modal -->
    <div id="success-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="check-circle" class="w-16 h-16 text-theme-20 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Data Berhasil Diperbarui!</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $judulcrud }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form name="mata_pelajaran" id="mata_pelajaran" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="mt-3">
                        <div>
                            <div>
                                <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                                <input id="nama_mapel" name="nama_mapel" value="{{ $data->nama_mapel }}" type="text"
                                    class="form-control w-full mb-3">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select data-placeholder="Pilih Kelas" name="kelas" class="tom-select w-full mb-3" id="kelas">
                            @foreach ($data_kelas as $list)
                                <option @if ($list->id == $data->kelas_id)
                                    selected="selected"
                                    @endif value="{{ $list->id }}">{{ $list->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" onclick="
                                window.location.href='{{ redirect()->getUrlGenerator()->route('kelola.mata_pelajaran') }}'
                                ">Kembali
                        </button>
                        <button type="submit" id="submit" class="btn btn-primary w-24">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        if ($("#mata_pelajaran").length > 0) {
            $("#mata_pelajaran").validate({
                rules: {
                    nama_mapel: {
                        required: true,
                    },
                    kelas: {
                        required: true,
                    },
                },
                messages: {
                    nama_mapel: {
                        required: "Nama Mata Pelajaran wajib diisi",
                    },
                    kelas: {
                        required: "Kelas wajib diisi",
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    cash(async function() {
                        // Loading state
                        cash('#submit').html('<i data-loading-icon="oval" data-color="white"></i>')
                            .svgLoader()
                        await helper.delay(1500)
                    });
                    $.ajax({
                        url: "{{ Request::url() }}/post",
                        type: "POST",
                        data: $('#mata_pelajaran').serialize(),
                        success: cash(async function(response) {
                            cash('#success-modal').modal('show')
                            await helper.delay(3000)
                            location.reload();
                        })
                    });
                }
            })
        }
    </script>
@endsection
