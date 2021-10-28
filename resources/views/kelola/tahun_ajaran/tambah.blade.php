@extends('../layout/' . $layout)

@push('judul', 'Tambah Kelas')
@push('breadcrumb', 'Tambah Kelas')

@section('subcontent')

    <!-- BEGIN: Success Modal -->
    <div id="success-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="check-circle" class="w-16 h-16 text-theme-20 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Data Berhasil Disimpan!</div>
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

    <!-- BEGIN: Success Modal -->
    <div id="error-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x" class="w-16 h-16 text-theme-21 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Data Sudah Ada!</div>
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
                <form name="tambah-tahun_ajaran" id="tambah-tahun_ajaran" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="mt-3">
                        <div>
                            <label for="tahun" class="form-label">Tahun Ajaran</label>
                            <select data-placeholder="Pilih Tahun Ajaran" class="tom-select w-full mb-3" name="tahun"
                                    id="tahun">
                                @for ($year = (int)date('Y'); 1995 <= $year; $year--)
                                    <option value="{{ $year + 3 }}/{{ $year + 4 }}">{{ $year + 3 }}
                                        /{{ $year + 4 }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" onclick="
                            window.location.href='{{ redirect()->getUrlGenerator()->route('kelola.tahun_ajaran') }}'
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
        if ($("#tambah-tahun_ajaran").length > 0) {
            $("#tambah-tahun_ajaran").validate({
                rules: {
                    tahun: {
                        required: true,
                    },
                },
                messages: {
                    tahun: {
                        required: "Tahun Ajaran wajib diisi",
                    },
                },
                submitHandler: function (form) {
                    let success = false;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    cash(async function () {
                        // Loading state
                        cash('#submit').html('<i data-loading-icon="oval" data-color="white"></i>').svgLoader()
                        await helper.delay(1500)
                    });
                    $("#submit").attr("disabled", true);
                    $.ajax({
                        url: "{{route('kelola.tahun_ajaran.tambah.post')}}",
                        type: "POST",
                        data: $('#tambah-tahun_ajaran').serialize(),
                        success: function (response) {
                            success = true;
                            $('#submit').html('Submit');
                            $("#submit").attr("disabled", false);
                            cash('#success-modal').modal('show');
                            document.getElementById("tambah-tahun_ajaran").reset();
                        },
                        error: cash(async function (response) {
                            if (success === false) {
                                cash('#error-modal').modal('show')
                                await helper.delay(1500)
                                location.reload();
                            }
                        })
                    });
                }
            })
        }
    </script>
@endsection
