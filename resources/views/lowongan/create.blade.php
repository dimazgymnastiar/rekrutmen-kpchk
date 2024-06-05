@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-12 col-xl-50 grid-margin stretch-card">
            <div class="card h-100 p-4">
                <div class="card-body ">
                    @if ($errors->any())
                        {!!  implode('',$errors->all('<div>:message</div>')) !!}
                    @endif
                    <h4 class="card-title">Tambah Lowongan</h4>
                    <form action="{{ route('lowongan.store') }}" class="forms-sample" method="post">
                        @csrf
                        <div class="col-sm-12 col-xl-20 pt-4 px-4">
                            <div class="bg-light rounded h-500 p-4">
                                <h6 class="mb-4">Lowongan Kerja</h6>
                                <div class="form-group row">
                                    <label for="posisi" class="col-sm-3 col-form-label">Posisi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="posisi" placeholder="Posisi" name ="posisi">
                                    </div>
                                </div>
                                <h4></h4>
                                {{-- <div class="form-group row">
                                    <label for="usiamin" class="col-sm-3 col-form-label">Usia Min.</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="usiamin" placeholder="minimal usia" name ="usiamin" rows="3">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usiamax" class="col-sm-3 col-form-label">Usia Max.</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="usiamax" placeholder="maximal usia" name ="usiamax" rows="3">
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label for="tgl_tutup" class="col-sm-3 col-form-label">Tanggal tutup</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tgl_tutup" placeholder="Tanggal tutup" name ="tgl_tutup">
                                    </div>
                                </div>
                                <h4></h4>
                                <div class="form-group row">
                                    <label for="syarat" class="col-sm-3 col-form-label">Persyaratan</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="syarat" placeholder="kualifikasi dan persyaratan" name ="syarat" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 pt-4">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route("lowongan.index") }}" class="btn btn-light">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
