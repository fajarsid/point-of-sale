<div>
    <button type="button" class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal"
        data-target="#formProduct{{ $id ?? '' }}">
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
            Produk Baru
        @endif
    </button>
    <div class="modal fade" id="formProduct{{ $id ?? '' }}">
        <form action="{{ route('master-data.products.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Edit Produk' : 'Tambah Produk' }} </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" name="product_name" id='product_name'
                                value="{{ $id ? $product_name : old('product_name') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Kategori Produk</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $category_id || old('category_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="">Harga Jual</label>
                            <input type="number" class="form-control" name="selling_price" id='selling_price'
                                value="{{ $id ? $selling_price : old('selling_price') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Harga Beli</label>
                            <input type="number" class="form-control" name="cost_price" id='cost_price'
                                value="{{ $id ? $cost_price : old('cost_price') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Stock</label>
                            <input type="number" class="form-control" name="quantity" id='quantity'
                                value="{{ $id ? $quantity : old('quantity') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Stok Minimal</label>
                            <input type="number" class="form-control" name="min_quantity" id="min_quantity"
                                value="{{ isset($min_quantity) ? $min_quantity : old('min_quantity') }}">

                        </div>
                        <div class="form-group my-1 d-flex flex-column">
                            <div class=" align-items-center">
                                <label for="" class="mr-4">Produk Aktif ?</label>
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                                    {{ old('is_active', $id ? $is_active : false) ? 'checked' : '' }}>
                            </div>
                            <small class="text-secondary">Jika aktif maka produk akan ditampilkan di halamana
                                kasir</small>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>
    <!-- /.modal -->
</div>
