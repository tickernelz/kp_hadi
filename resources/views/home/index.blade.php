@extends('../layout/' . $layout)

@push('judul', 'Beranda')

@push('breadcrumb', 'Beranda')

@section('subcontent')
    <div class="text-center">
        <h1 class="intro-y text-4xl font-bold mt-10">Selamat Datang Di Sistem Penilaian Hasil Belajar</h1>
        <br>
        <h4 class="intro-y text-2xl">SDN-6 PANARUNG</h4>
    </div>

    <section class="intro-y hero container max-w-screen-lg mt-4 pb-10 flex justify-center">
        <img src="{{ asset('dist/images/logo.png') }}" class="object-center" width="400px" alt="logo">
    </section>
@endsection
