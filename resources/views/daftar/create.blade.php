@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
                {!!  implode('',$errors->all('<div>:message</div>')) !!}
            @endif
                <h4 class="card-title">Isi Lamaran</h4>
                <form action="{{ route('daftar.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    <form class="form-sample">
                      @csrf
                      <p class="card-description">Data Pribadi</p>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="foto">Foto</label>
                                  <input type="file" class="form-control" id="foto" name="foto" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="tglLahir">Tanggal Lahir</label>
                                  <input type="date" class="form-control" id="tglLahir" name="tglLahir">
                              </div>
                          </div>
                      </div>
                  
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="lowongan_id">Pilih Posisi</label>
                                  <select name="lowongan_id" class="form-control">
                                      @foreach ($lowongan->sortBy('posisi') as $data)
                                          <option value="{{ $data->id }}">{{ $data->posisi }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="nama">Nama Lengkap</label>
                                  <input type="text" class="form-control" id="nama" name="nama">
                              </div>
                          </div>
                      </div>
                  
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="jenisKelamin">Jenis Kelamin</label>
                                  <select name="jenisKelamin" class="form-control">
                                      <option>Laki-laki</option>
                                      <option>Perempuan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="pend">Pendidikan Terakhir</label>
                                  <select name="pend" class="form-control">
                                      <option>SD</option>
                                      <option>SMP</option>
                                      <option>SMA</option>
                                      <option>S1</option>
                                      <option>S2</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cerita">Ceritakan Dirimu</label>
                                  <textarea class="form-control" id="cerita" name="cerita"></textarea>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cv">CV</label>
                                  <input type="file" class="form-control" id="cv" name="cv" required>
                              </div>
                          </div>
                      </div>
                  
                      <div class="row">
                          <div class="col-md-12 text-right">
                              <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              <a href="{{ route('daftar.index') }}" class="btn btn-light">Cancel</a>
                          </div>
                      </div>
                  </form>
                  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
