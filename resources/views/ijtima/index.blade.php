@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Ijtima'</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Data Ijtima</div>

            <div class="card-body">
                <form action="{{ route('ijtima.index') }}" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_hijriah">Tahun Hijriah</label>
                                <input type="number" required min="0" value="{{ request()->tahun_hijriah ?? old('tahun_hijriah') }}" class="form-control" id="tahun_hijriah" name="tahun_hijriah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bulan_hijriah">Bulan Hijriah</label>
                                <select required name="bulan_hijriah" class="select-2 form-control form-control">
                                    @foreach ($bulan as $bln)
                                    <option @if(request()->bulan_hijriah == $bln->id) selected @endif value="{{ $bln->id }}">{{ $bln->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-auto">
                            <button class="w-100 btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card @if(empty($data)) d-none @endif">
            <div class="card-header header-primary">Data Hilal</div>

            <div class="card-body">
                {{-- ijtima.create --}}
                <form action="{{ route('ijtima.create') }}" method="get">
                    @method('get')
                    @csrf
                    <input type="hidden" name="tahun_hijriah" value="{{ request()->tahun_hijriah }}">
                    <input type="hidden" name="bulan_hijriah" value="{{ request()->bulan_hijriah }}">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="markaz">Markaz</label>
                                <input required value="Pelabuhan Ratu" class="form-control" id="markaz" name="markaz">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="lintang">Lintang</label>
                                <input required type="number" step="any" value="-7.02905" class="form-control" id="lintang" name="lintang">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="bujur">Bujur</label>
                                <input required type="number" step="any" value="106.55772" class="form-control" id="bujur" name="bujur">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="tinggi_tempat">Tinggi Tempat</label>
                                <input required type="number" step="any" min="0" value="52.865" class="form-control" id="tinggi_tempat" name="tinggi_tempat">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="zona_waktu">Zona Waktu</label>
                                <input required type="number" step="any" value="7" class="form-control" id="zona_waktu" name="zona_waktu">
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="ihtiyath">Ihtiyath</label>
                                <input required type="number" step="any" min="0" value="{{ old('ihtiyath') }}" class="form-control" id="ihtiyath" name="ihtiyath">
                            </div>  
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Ijtima'</label>
                                <input required type="date" value="{{ ($data != null && $data['DATE_CARBON'] != null)? $data['DATE_CARBON']->toDateString() : \Carbon\Carbon::now()->toDateString() }}" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-auto">
                            <button class="w-100 btn btn-primary">Print</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@include('partial.dataTable')
@endsection
