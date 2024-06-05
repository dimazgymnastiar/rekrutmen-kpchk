@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-12 col-xl-20 grid-margin stretch-card">
        <div class="card h-100 p-4">
            <div class="card-body">
                <div class="text-end">
                    <h5>Total Pelamar: {{ $jumlahPelamar1 }}</h5>
                </div>
                <h4 class="card-title">Pelamar untuk Interview</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Posisi</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($interviews->count() > 0)
                            @foreach($interviews as $data)
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
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <form method="post" action="#" style="margin-right: 5px;">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-rounded btn-xs">Terima</button>
                                        </form>
                                        <form method="post" action="{{ route('interviews.destroy', $data->id) }}">
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
                                <td class="text-center" colspan="5">Belum ada pelamar yang lolos</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
