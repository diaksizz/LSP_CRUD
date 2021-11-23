@extends('main')
@section('content')
    

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">About</a></h3></br>
                </div></br>

                
                <div class="card-body">
                   <div class="row form-group">
                    <div class="col col-md-2">
                    <a href="#">
                        <img class="align-self-center mr-3" style="width:170px; height:215px;" alt="" src="{{ asset('storage/images/foto_okta.png') }}">
                    </a>
                    </div>
        
                    <div class="col-12 col col-md-8">
                        Aplikasi ini dibuat oleh : </br>
                        Nama : Okta Aditya Pratama </br>
                        NIM : 1931713010 </br>
                        Tanggal : 22 November 2021 </br>
                    </div>
                   </div>

                </div>


            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->




@endsection