<!-- resources/views/riwayat/index.blade.php -->

@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Riwayat Lamaran</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Posisi</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Cerita</th>
                                <th>Foto</th>
                                <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayats as $riwayat)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $riwayat->lowongan->posisi }}</td>
                                    <td>{{ $riwayat->nama }}</td>
                                    <td>{{ $riwayat->tglLahir }}</td>
                                    <td>{{ $riwayat->jenisKelamin }}</td>
                                    <td>{{ $riwayat->pend }}</td>
                                    <td>{{ $riwayat->cerita }}</td>
                                    <td><img src="{{ Storage::url($riwayat->foto) }}" alt="Foto" width="50"></td>
                                    <td><a href="{{ Storage::url($riwayat->cv) }}" target="_blank">Lihat CV</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
