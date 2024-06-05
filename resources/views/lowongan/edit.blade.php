@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    <h1 class="card-title text-primary">Edit Lowongan</h1>
                    <form class="forms-sample" method="post" action="{{ route('lowongan.update', $lowongan) }}"
                        enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="posisi" class="col-sm-3 col-form-label">
                                <h5>Posisi</h5>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="posisi" placeholder="Posisi"
                                    value="{{ old('posisi') ?? $lowongan->posisi }}">
                                @error('posisi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_tutup" class="col-sm-3 col-form-label">
                                <h5>Tanggal Tutup</h5>
                            </label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_tutup" placeholder="tgl_tutup"
                                    value="{{ old('tgl_tutup') ?? $lowongan->tgl_tutup }}">
                                @error('tgl_tutup')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="syarat" class="col-sm-3 col-form-label">
                                <h5>Persyaratan</h5>
                            </label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="syarat" placeholder="kualifikasi dan persyaratan" rows="5">{{ old('syarat') ?? $lowongan->syarat }}</textarea>
                                @error('syarat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="usiamin" class="col-sm-3 col-form-label">
                                <h5>Usia Min.</h5>
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="usiamin" placeholder="usia minimal"
                                    value="{{ old('usiamin') ?? $lowongan->usiamin }}">
                                @error('usiamin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="usiamax" class="col-sm-3 col-form-label">
                                <h5>Syarat</h5>
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="usiamax" placeholder="usia maximal"
                                    value="{{ old('usiamax') ?? $lowongan->usiamax }}">
                                @error('usiamax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('lowongan.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row end -->
<!-- row end -->
@endsection