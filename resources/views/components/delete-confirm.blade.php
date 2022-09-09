<x-ModalPopUp id="delete-prompt-modal" title="Warning!">
    @slot('modalContent')
        <div class="text-center">
            {!! Form::hidden('hidden_delete_id', '') !!}
            <h5>Are you sure want to delete this?</h5>
        </div>
    @endslot
    @slot('action')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger delete-confirm-btn"><i class="far fa-trash-alt"></i> Delete</button>
    @endslot

</x-ModalPopUp>
