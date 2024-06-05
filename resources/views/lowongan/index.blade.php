@extends('layout.master')

@section('contents')
          <div class="row">
            <div class="col-lg-12 col-xl-20 grid-margin stretch-card">
              <div class="card h-100 p-4">
                <div class="card-body">
                  <a href="{{ route('lowongan.create') }}"class="btn btn-dark mb-5 w-10">Add Loker</a>
                  <h4 class="card-title">Lowongan Tersedia saat ini</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Posisi</th>
                            <th>Tanggal tutup</th>
                            <th>Syarat</th>
                        </tr>
                      </thead>
                      <tbody>
                            @if($lowongan->count() > 0)
                            @foreach($lowongan as $data)
                                <tr>
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      {{ $loop->iteration }}
                                    </th>
                                    <td>{{ $data -> posisi}}</td>
                                    <td>{{ $data -> tgl_tutup}}</td>
                                    <td>{!! nl2br(e($data->syarat)) !!}</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td class="text-center">
                                      <form method="post" action="{{ route('lowongan.destroy', $data->id) }}">
                                        <td class="text-center">
                                          <form method="post" action="{{ route('lowongan.destroy', $data->id) }}">
                                              <a href="{{ route('lowongan.edit', $data->id) }}" class="btn btn-primary btn-rounded btn-xs" title="Edit">
                                                  <i class="fas fa-edit"></i>
                                              </a>
                                              <a href="{{ route('lowongan.show', $data->id) }}" class="btn btn-warning btn-rounded btn-xs" title="Detail">
                                                  <i class="fas fa-info-circle"></i>
                                              </a>
                                              @csrf
                                              @method('DELETE')
                                              <button onclick="return confirm('Yakin Menghapus Lowongan')" class="btn btn-danger btn-rounded btn-xs" title="Hapus">
                                                  <i class="fas fa-trash"></i>
                                              </button>
                                          </form>
                                      </td>
                                      @endif                                      
                                        {{-- <a href="{{ route('lowongan.edit', $data->id) }}"
                                            class="btn btn-primary btn-rounded btn-xs">Edit</a>
                                        <a href="{{ route('lowongan.show', $data->id) }}"
                                            class="btn btn-warning btn-rounded btn-xs">Detail</a>
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Yakin Menghapus Lowongan')"class="btn btn-danger">Hapus</button>
                                             --}}
                                    </form>
                                  </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="5">Belum ada lowongan</td>
                            </tr>
                            @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->
          <!-- row end -->
@endsection