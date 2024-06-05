@extends('layout.master')

@section('title', 'Show Product')

@section('contents')
<div class="container">
    <h1 class="font-bold text-2xl ml-3 header">Detail Lowongan</h1>
    <hr />
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4 detail-item">
                <label class="block text-sm font-medium leading-6 text-gray-900">Posisi</label>
                <div class="mt-2 value">
                    {{ $lowongan->posisi }}
                </div>
            </div>
            <div class="sm:col-span-4 detail-item">
                <label class="block text-sm font-medium leading-6 text-gray-900">Tanggal Tutup</label>
                <div class="mt-2 value">
                    {{ $lowongan->tgl_tutup }}
                </div>
            </div>
            <div class="sm:col-span-4 detail-item" type="textarea">
                <label class="block text-sm font-medium leading-6 text-gray-900">Syarat</label>
                <div class="mt-2 value">
                    {!! nl2br(e($lowongan->syarat)) !!}
                </div>
            </div>
            <a href="{{ route('lowongan.index') }}" class="btn btn-success">Kembali</a>
            <a href="{{ route('daftar.create') }}" class="btn btn-primary">Lamar sekarang</a>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #f9fafb; /* Light background color */
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff; /* White background for content */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .header {
        margin-bottom: 20px;
    }
    .detail-item {
        margin-bottom: 15px;
    }
    .detail-item label {
        font-weight: bold;
    }
    .detail-item .value {
        margin-top: 5px;
        padding: 10px;
        background-color: #ffffff; /* White background for value */
    }
</style>