@extends('main')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    {{-- <strong class="card-title">Arsip Surat</strong> --}}
                    <h3><a href="#">Arsip Surat</a></h3></br>
                    <h6>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h6>
                    <h6>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h6>
                </div>
                <br>
                <div class="card-body">
                    <div class="table-responsive p-2">
                    <table class="table table-striped" id="tabelArsip">
                      <thead >
                        <tr>
                          <th scope="col">Nomor Surat</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Waktu Pengarsipan</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($arsip as $item)
                        <tr>
                          <td>{{ $item->nomor_surat }}</td>
                          <td>{{ $item->kategori }}</td>
                          <td>{{ $item->judul }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                              <button type="submit" class="btn btn-danger btn-sm" id="hapus{{$item->id}}">Hapus
                            </button>
                            <script type="text/javascript">
                                $("#hapus{{$item->id}}").click(function () {
                                    Swal.fire({
                                        title: 'Anda Yakin Menghapus Arsip ini?',
                                        text: "Data tidak bisa kembali!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Lanjut'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                type: 'get',
                                                url: "{{route('hapusArsip')}}",
                                                data: {
                                                    id: "{{$item->id}}"
                                                },
                                                success: function () {
                                                    Swal.fire({
                                                        title: 'Yes!!',
                                                        text: 'Hapus Arsip Berhasil',
                                                        icon: 'success',
                                                        showConfirmButton: false,
                                                        focusConfirm: true,
                                                        success: setInterval(function () {
                                                            location.reload()
                                                        }, 950),
                                                    });
                                                },
                                                error: function () {
                                                    Swal.fire({
                                                        title: 'Oops!',
                                                        text: 'Hapus Arsip Gagal!',
                                                        icon: 'error',
                                                        confirmButtonText: 'OK'
                                                    });
                                                }

                                            });
                                        }
                                    });
                                });
                            </script>
                              <a href="{{asset('storage/arsip/'.$item->nama_berkas)}}" download  rel="noopener noreferrer" class="btn btn-warning  btn-sm">
                               Unduh
                              </a>
                              <a href="{{ route('lihatArsip', $item->id) }}" class="btn btn-primary btn-sm">Lihat >></a>
                          </td>
                        </tr>
                          @endforeach
                      </tbody>
                    </table>
                    </div>
                    <hr>
                    <br>
                    <a href="{{ url('arsipkan') }}" class="btn btn-secondary ">Arsipkan Surat</a>
                </div>
            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
    $(document).ready(function () {
        var table = $('#tabelArsip').DataTable({
            "columnDefs": [{
                // "orderable": false,
                // "searchable": false,
                lengthChange: false,
                "targets": 2
            }],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },

                {
                    extend: 'print',
                    text: 'PDF',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy Text',
                },
                'colvis',
            ],
            "aLengthMenu": [
                [5, 10, 25, -1],
                [5, 10, 25, "All"]
            ],
            "iDisplayLength": 5
        });
        table.buttons().container()
            .appendTo('#tabelaspirasi_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection