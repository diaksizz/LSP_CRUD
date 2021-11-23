@extends('main')
@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">Arsip Surat</a> / <a href="#">Unggah</a></h3></br>
                    <h6>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</h4>
                    <h6>Catatan :</h6>
                    <h6><li>Gunakan file berformat PDF</li></h6>
                </div>
                </br>

                <div class="card-body">
                     <form method="POST" action="{{route('storeArsip')}}" enctype="multipart/form-data" id="formEdit">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Nomor Surat</label></div>
                        <div class="col-12 col col-md-4"><input type="text" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" class="form-control"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="kategori" class=" form-control-label">Kategori</label></div>
                        <div class="col-12 col col-md-2">
                          <select name="kategori" id="kategori" class="form-control">
                            <option value="undangan">Undangan</option>
                            <option value="rapat">Rapat</option>
                            <option value="pengumuman">Pengumuman</option>
                            <option value="administrasi">Administrasi</option>
                          </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="text-input" class=" form-control-label">Judul</label></div>
                        <div class="col-12 col col-md-8"><input type="text" id="judul" name="judul" placeholder="Judul" class="form-control"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="file-input" class=" form-control-label">File input</label></div>
                        <div class="col-12 col-md-4"><input type="file" id="berkas" name="berkas" class="form-control-file"></div>
                    </div>

                    <div class="card-footer col-12">
                        
                            <a href="{{ route('beranda') }}" class="btn btn-primary"><< Kembali</a>
                        
                        <button type="sumbit" onclick="return confirm('Simpan data arsip ?')" class="btn btn-success">
                          Simpan
                        </button>
                    </div>
                     </form>
                </div>

 
            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection