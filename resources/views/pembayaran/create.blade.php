@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Pembayaran</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">{{ __('NISN') }}</label>
                            <div class="col-md-6">
                                <select id="nisn" class="form-control @error('nisn') is-invalid @enderror" name="nisn" required>
                                    <option value="" disabled selected>Pilih Nisn</option>
                                    @foreach ($siswaList as $siswa)
                                    <option value="{{ $siswa->nisn }}">{{ $siswa->nisn }} - {{ $siswa->nama }}</option>
                                    @endforeach
                                </select>
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tgl_bayar" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Dibayar') }}</label>
                            <div class="col-md-6">
                                <input id="tgl_bayar" type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" 
                                       name="tgl_bayar" value="{{ old('tgl_bayar') }}" required autocomplete="tgl_bayar">
                                @error('tgl_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bulan_dibayar" class="col-md-4 col-form-label text-md-end">{{ __('Bulan Dibayar') }}</label>
                            <div class="col-md-6">
                                <select id="bulan_dibayar" class="form-control @error('bulan_dibayar') is-invalid @enderror" name="bulan_dibayar" required>
                                    <option value="" disabled selected>Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                @error('bulan_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="tahun_dibayar" class="col-md-4 col-form-label text-md-end">{{ __('Tahun Dibayar') }}</label>
                            <div class="col-md-6">
                                <input id="tahun_dibayar" type="text" class="form-control @error('tahun_dibayar') is-invalid @enderror" 
                                       name="tahun_dibayar" value="{{ old('tahun_dibayar') }}" required autocomplete="tahun_dibayar">
                                @error('tahun_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="jumlah_bayar" class="col-md-4 col-form-label text-md-end">{{ __('Jumlah Dibayar') }}</label>
                            <div class="col-md-6">
                                <input id="jumlah_bayar" type="text" class="form-control @error('jumlah_bayar') is-invalid @enderror" 
                                       name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required autocomplete="jumlah_bayar">
                                @error('jumlah_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Siswa') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection