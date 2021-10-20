<form action="{{ route('setiapsaat.destroy', $setiapsaat->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <a href="{{ route('setiapsaat.edit', $setiapsaat->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="Ubah">
        <i class="fa fa-edit text-warning"></i>
    </a>

    <a data-toggle="modal" data-target="#delete_modal-{{ $setiapsaat->id }}"
        class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Hapus">
        <i class="fa fa-trash text-danger"></i>
    </a>

    {{-- <a href="{{ route('setiapsaat.show', $setiapsaat->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
    title="Detail">
    <i class="fa fa-search text-primary"></i>
    </a> --}}

    <a href="{{ route('setiapsaat.download', $setiapsaat->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
        download>
        <i class="fa fa-download"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="delete_modal-{{ $setiapsaat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data ini ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-clean" data-dismiss="modal">
                        <i class="fa fa-reply"></i>Kembali</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>Hapus</button>
                </div>
            </div>
        </div>
    </div>

</form>
