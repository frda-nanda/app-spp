@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pembayaran</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>
                            <div class="col-md-6">
                                <select id="nisn" class="form-control @error('nisn') is-invalid @enderror" name="nisn" required>
                                    @foreach($siswa as $s)
                                        <option value="{{ $s->nisn }}" {{ $pembayaran->nisn == $s->nisn ? 'selected' : '' }}>
                                            {{ $s->nisn }} - {{ $s->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row mb-3">
                            <label for="tgl_bayar" class="col-md-4 col-form-label text-md-right">Tanggal Bayar</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar" value="{{ old('tgl_bayar', $pembayaran->tgl_bayar) }}" required>
                                @error('tgl_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bulan_dibayar" class="col-md-4 col-form-label text-md-right">{{ __('Bulan Dibayar') }}</label>
                            <div class="col-md-6">
                                <select id="bulan_dibayar" class="form-control @error('bulan_dibayar') is-invalid @enderror" name="bulan_dibayar" required>
                                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                        <option value="{{ $bulan }}" {{ $pembayaran->bulan_dibayar == $bulan ? 'selected' : '' }}>
                                            {{ $bulan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bulan_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label for="tahun_dibayar" class="col-md-4 col-form-label text-md-right">Tahun Bayar</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tahun_dibayar') is-invalid @enderror" name="tahun_dibayar" value="{{ old('tahun_dibayar', $pembayaran->tahun_dibayar) }}" required>
                                @error('tahun_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label for="jumlah_bayar" class="col-md-4 col-form-label text-md-right">Jumlah Bayar</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar" value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" required>
                                @error('jumlah_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection