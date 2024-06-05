@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-12 col-xl-20 grid-margin stretch-card">
        <div class="card h-100 p-4">
            <div class="card-body">
                <a href="{{ route('daftar.create') }}" class="btn btn-success mb-5 w-10">Tambah Pelamar</a>
                <div class="text-end">
                    <h5>Total Pelamar: {{ $jumlahPelamar }}</h5>
                </div>
                <h4 class="card-title">Pelamar saat ini</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Posisi</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($daftar->count() > 0)
                            @foreach($daftar as $data)
                            <tr>
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td>
                                    <img src="{{ asset('image/daftar/' . $data->foto) }}"
                                                    alt="{{ $data->nama }}" width="100" height="90">
                                </td>
                                <td>{{ $data->lowongan->posisi }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jenisKelamin }}</td>
                                <td>
                                    <a href="{{ asset('file/cv' . $data->cv) }}" target="_blank">Lihat CV</a>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary btn-rounded btn-xs mr-2" 
                                                onclick="showDetailModal({{ json_encode($data) }})" style="margin-right: 5px;">
                                            Detail
                                        </button>
                                        <form method="post" action="{{ route('daftar.accept', $data->id) }}" style="margin-right: 5px;">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-rounded btn-xs mr-2">Terima</button>
                                        </form>
                                        <form method="post" action="{{ route('daftar.destroy', $data->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin Menghapus Pelamar?')" class="btn btn-danger btn-rounded btn-xs">Tolak</button>
                                        </form>
                                    </div>
                                </td>                                
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="5">Belum ada pelamar terdaftar</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Pelamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function showDetailModal(data) {
        let modalContent = `
            <img src="/image/daftar/${data.foto}" alt="${data.nama}" width="200">
            <p><strong>Nama Lengkap:</strong> ${data.nama}</p>
            <p><strong>Posisi:</strong> ${data.lowongan.posisi}</p>
            <p><strong>Jenis Kelamin:</strong> ${data.jenisKelamin}</p>
            <p><strong>Tanggal Lahir:</strong> ${data.tglLahir}</p>
            <p><strong>Pendidikan:</strong> ${data.pend}</p>
            <p><strong>Cerita:</strong> ${data.cerita}</p>
            <p><strong>CV:</strong> <a href="/file/cv/${data.cv}" target="_blank">Lihat CV</a></p>
        `;
    
        document.getElementById('modalContent').innerHTML = modalContent;
        $('#detailModal').modal('show');
    }
    </script>
    