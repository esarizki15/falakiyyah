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
                <form action="{{ route('ijtima.create') }}" method="get">
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
                                    @foreach ($bulan as $data)
                                    <option @if(request()->bulan_hijriah == $data->id) selected @endif value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
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
        <div class="card d-none">
            <div class="card-header header-primary">Data Hilal</div>

            <div class="card-body">
                <form action="{{ route('ijtima.store') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="lintang">Lintang</label>
                                <input type="number" min="0" value="{{ old('lintang') }}" class="form-control-file" id="lintang" name="lintang">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="bujur">Bujur</label>
                                <input type="number" min="0" value="{{ old('bujur') }}" class="form-control-file" id="bujur" name="bujur">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="tinggi_tempat">Tinggi Tempat</label>
                                <input type="number" min="0" value="{{ old('tinggi_tempat') }}" class="form-control-file" id="tinggi_tempat" name="bujur">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="zona_waktu">Zona Waktu</label>
                                <input type="number" min="0" value="{{ old('zona_waktu') }}" class="form-control-file" id="zona_waktu" name="bujur">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="ihtiyath">Ihtiyath</label>
                                <input type="number" min="0" value="{{ old('ihtiyath') }}" class="form-control-file" id="ihtiyath" name="bujur">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}" class="form-control-file" id="tanggal" name="bujur">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-auto">
                            <button class="w-100 btn btn-primary">Print</button>
                        </div>
                    </div>
                </form>
                {{-- <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $us)
                            <tr>
                                <td>{{ $us->name }}</td>
                                <td>{{ $us->email }}</td>
                                <td>{{ $us->role->name }}</td>
                                <td>
                                    @include('partial.action', ['data' => $us, 'route'=>'user'])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>
      </div>
    </div>
</div>
@include('partial.dataTable')
@endsection
