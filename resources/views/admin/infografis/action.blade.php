<form action="{{ route('infografis.destroy', $infografis->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <a href="{{ route('infografis.edit', $infografis->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="Ubah">
        <i class="fa fa-edit text-warning"></i>
    </a>

    <a data-toggle="modal" data-target="#delete_modal-{{ $infografis->id }}"
        class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Hapus">
        <i class="fa fa-trash text-danger"></i>
    </a>

    <a href="{{ route('infografis.show', $infografis->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
        title="Detail">
        <i class="fa fa-search text-primary"></i>
    </a>

    <a href="{{ route('infografis.download', $infografis->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
        download>
        <i class="fa fa-download"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="delete_modal-{{ $infografis->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
