<x-ModalPopUp id="reject-prompt-modal" title="Warning!">
    
    @slot('modalContent')
    <form name="case_reject_comment_form" id="case_reject_comment_form" method="post" action="{{url('cases-reject-reason')}}">
        <div class="text-center">
            {!! Form::hidden('hidden_reject_id', '') !!}
            <h5>Are you sure want to reject this?</h5>
        </div>
        
        <div class="form-group">
            {!! Form::label('comment','Comment',['class' => 'f_14']) !!}
            <small class="text-muted">
               <span id="current_count_comment">@if(@$result->address) {{strlen($result->address)}} @else 0 @endif</span>
               <span id="maximum_count_comment">/ 500</span>
            (Maximum 500 Characters)</small>
            {!! Form::textarea('comment', isset($result->address) ? $result->address:null, ['rows' => 10, 'cols' => 40,'class' => 'form-control', 'placeholder' =>'Enter Reject Reason', 'autofocus','maxlength'=>"500",'id'=>'comment_textarea']) !!}
            
            @if ($errors->has('comment')) 
               <p class="error">{{ $errors->first('comment') }}</p>
            @endif
         </div>
    @endslot
    @slot('action')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger reject-confirm-btn"><i class="far fa-trash-alt"></i> Reject</button>
    @endslot
    </form>
</x-ModalPopUp>
