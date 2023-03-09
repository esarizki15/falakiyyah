@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Kusuf</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Data Kusuf</div>

            <div class="card-body">
                <form action="{{ route('kusuf.index') }}" method="get">
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
            <div class="card-header header-primary">Data Kusuf</div>

            <div class="card-body">
                <form action="{{ route('kusuf.create') }}" method="get">
                    @method('get')
                    @csrf
                    <input type="hidden" name="tahun_hijriah" value="{{ request()->tahun_hijriah }}">
                    <input type="hidden" name="bulan_hijriah" value="{{ request()->bulan_hijriah }}">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="zona_waktu">Zona Waktu</label>
                                <input required type="number" step="any" value="{{ old('zona_waktu') }}" class="form-control" id="zona_waktu" name="zona_waktu">
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
