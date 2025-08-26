@extends('layouts.app')
@section('content_title', 'Data Produk')
@section('content')

    <div class="card">
        <div class="card-title">
            <h4 class="card-header">Data Produk</h4>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <x-product.form-product /> 
            </div>
            <x-alert :errors="$errors" type="danger"/>
            <table class="table table-sm" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>Rp. {{ number_format($product->selling_price, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($product->cost_price, 0, ',', '.') }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <p class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    {{ $product->is_active }}
                                </p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <x-product.form-product :id="$product->id" /> 
                                        <a href="{{ route('master-data.products.destroy', $product->id) }}" class="btn btn-danger btn-sm mx-1" data-method="delete" data-confirm="Anda yakin ingin menghapus produk ini?"><i class="fas fa-trash"></i></a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>

@endsection
