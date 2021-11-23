@extends('main')
@section('content')
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">Arsip Surat</a> / <a href="#">Lihat</a></h3></br>
                    <h6>Nomor :{{$arsip->nomor_surat}}</h6>
                    <h6>Kategori : {{$arsip->kategori}}</h6>
                    <h6>Judul : {{$arsip->judul}}</h6>
                    <h6>Waktu Unggah  :{{$arsip->created_at}}</h6>
                </div></br>

                {{-- pdf stream --}}
                <div class="card-body">
                    <iframe style="height: 800px; width:1200px; " src="{{ asset('storage/arsip/'. $arsip->nama_berkas) }}" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" >
                    </iframe>
                   
                </div>
                 

                <div class="card-footer col-12">
                    <a href="{{ route('beranda') }}" class="btn btn-primary"><< Kembali</a>
                    <a href="{{asset('storage/arsip/'.$arsip->nama_berkas)}}" download class="btn btn-warning">
                        Unduh
                       </a>
                    <a href="{{ route('arsipkanUpdate',$arsip->id) }}" class="btn btn-success">Edit/Ganti File</a>
            </div>

            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection