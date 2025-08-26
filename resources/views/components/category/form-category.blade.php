<div>
    <button type="button" class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal"
        data-target="#formCategory{{ $id ?? '' }}">
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
            Kategori Baru
        @endif
    </button>

    <div class="modal fade" id="formCategory{{ $id ?? '' }}">
        <div class="modal-dialog">
            <form action="{{ route('master-data.categories.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id ?? '' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Edit Kategori' : 'Tambah Kategori' }}</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Nama Kategori" name="category_name"
                                id="category_name" value="{{ $category_name ?? '' }}">
                        </div>
                        <div>
                            <label for="">Deskripsi</label>
                            <textarea class="form-control" placeholder="Deskripsi" cols="30" rows="10" name="description"
                                id="description">{{ $description ?? '' }}</textarea>
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
</div>
