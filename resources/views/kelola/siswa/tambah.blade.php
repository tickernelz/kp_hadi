@extends('../layout/' . $layout)

@push('judul', 'Tambah Siswa')
@push('breadcrumb', 'Tambah Siswa')

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

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{ $judulcrud }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form name="tambah-user" id="tambah-user" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="mt-3">
                        <div>
                            <label for="nis" class="form-label">NIS</label>
                            <input id="nis" name="nis" type="number" class="form-control w-full mb-3">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input id="nama" name="nama" type="text" class="form-control w-full mb-3">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input id="username" name="username" type="text" class="form-control w-full mb-3">
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select data-placeholder="Pilih Kelas" name="kelas" class="tom-select w-full mb-3"
                                id="kelas">
                            @foreach($data_kelas as $list)
                                <option value="{{ $list->id }}">{{ $list->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" class="form-control w-full mb-3">
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" onclick="
                            window.location.href='{{ redirect()->getUrlGenerator()->route('kelola.siswa') }}'
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
        if ($("#tambah-user").length > 0) {
            $("#tambah-user").validate({
                rules: {
                    nis: {
                        required: true,
                        remote: {
                            url: "{{route('kelola.siswa.tambah.ceknis')}}",
                            type: "post",
                            data: {
                                _token: function () {
                                    return "{{csrf_token()}}"
                                }
                            }
                        }
                    },
                    nama: {
                        required: true,
                    },
                    username: {
                        required: true,
                        remote: {
                            url: "{{route('kelola.user.tambah.cekusername')}}",
                            type: "post",
                            data: {
                                _token: function () {
                                    return "{{csrf_token()}}"
                                }
                            }
                        }
                    },
                    kelas: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    nis: {
                        required: "NIS wajib diisi",
                    },
                    nama: {
                        required: "Nama wajib diisi",
                    },
                    username: {
                        required: "Username wajib diisi",
                    },
                    kelas: {
                        required: "Kelas wajib diisi",
                    },
                    password: {
                        required: "Password wajib diisi",
                    },
                },
                submitHandler: function (form) {
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
                        url: "{{route('kelola.siswa.tambah.post')}}",
                        type: "POST",
                        data: $('#tambah-user').serialize(),
                        success: function (response) {
                            $('#submit').html('Submit');
                            $("#submit").attr("disabled", false);
                            cash('#success-modal').modal('show')
                            document.getElementById("tambah-user").reset();
                        }
                    });
                }
            })
        }
    </script>
@endsection
