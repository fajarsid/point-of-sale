@extends('layouts.app')
@section('content_title', 'Data Kategori')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Kategori</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <small class="text-white">{{ $error }}</small>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex justify-content-end mb-2">
                <x-category.form-category />
            </div>
            <table class="table table-sm table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <x-category.form-category :id="$item->id" />
                                        <a href="{{ route('master-data.categories.destroy', $item->id) }}" data-confirm-delete="true" class="btn btn-danger mx-1"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
