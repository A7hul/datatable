<x-ModalPopUp id="approve-prompt-modal" title="Confirmation!">
    @slot('modalContent')
        <div class="text-center">
            {!! Form::hidden('hidden_approve_id', '') !!}
            <h5>Are you sure want to approve this?</h5>
        </div>
    @endslot
    @slot('action')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success approve-confirm-btn"><i class="far fa-trash-alt"></i> Approve</button>
    @endslot

</x-ModalPopUp>
