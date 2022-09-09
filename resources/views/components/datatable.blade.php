
 <div class="row p-2">


<!-- <div class="mt-2 col-md-8 text-right">
  @if(@$hideAction == false)
  <div class="">
      {{-- <button class="btn btn-sm btn-dark"><i class="fas fa-download"></i> Export</button>
       --}}
      @if(@$export)
        <button data-exporturl="{{$exportUrl}}" class="btn btn-sm btn-dark export-table-data" data-id="{{$id}}"><i class="fa fa-upload"></i> Export</button>
      @endif
      @if($filter!='false')
        <button data-toggle="collapse" data-target="#collapse-table-filter-{{$id}}" aria-expanded="false" aria-controls="collapse-table-filter-{{$id}}" type="button" class="btn btn-sm btn-secondary mr-1"><i class="fa fa-filter"></i> Filter</button>
      @endif
      @if($create!='false')
      <a href="{{route($createUrl)}}" class="btn btn-sm btn-dark text-white"><i class="fa fa-plus"></i> Create new</a>
      @endif
  </div>
  @endif
</div> -->

 </div>
<div class="">
  <div id="append-filter-text"></div>
</div>

@if(isset($filterBlock))
<div class="px-4 bg-light" id="filter-datatable-block__{{$id}}">
  <div class="collapse mb-4 mt-4" id="collapse-table-filter-{{$id}}">
    <div class="">
      {{$filterBlock}}
    </div>
    <div class="mt-2 text-right">
      <button data-type="datatable" data-table="{{$id}}" class="btn btn-info btn-sm reset-datatable-filter">Clear</button>
      <button data-type="datatable" data-table="{{$id}}" class="btn btn-dark btn-sm datatable-filter-find">Submit</button>
    </div>
  </div>
</div>
@endif

{{-- <div id="init-table-loader" class="p-5 mt-5 mb-5 text-center"><i class="fas fa-spinner fa-pulse"></i> Loading...</div>

   --}}
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card storeprofile_page">
        <div class="card-body tabwth_topbtn">
          <div class="table-responsive bills_table_outer ">
            <table id="{{$id}}" class="table table-hover table_common shadow_box table-striped">
                <thead>
                    <tr>
                        @foreach($headers as $key => $items)
                        @if($items == ' ')
                        <th style="width: 80px;">{!!$items!!}</th>
                        @elseif($items == 'created at')
                        <th style="width: 80px;">{{$items}}</th>
                        @elseif($items === 'status')
                        <th style="width: 80px;">{{$items}}</th>
                        @elseif($items === 'created by')
                        <th style="width: 80px;">{{$items}}</th>
                        @else
                        <th style="width:80px !important;">{!!$items!!}</th>
                        @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<x-DeleteConfirm />
<x-RejectConfirm />
<x-ApproveConfirm />
<x-ModalPopUp id="table-export-data-{{$id}}" title="export">
  @slot('modalContent')
      <div class="row">
        <div class="col-md-6" id="append-export-fields-{{$id}}">
          
        </div>
        <div class="col-md-6">
            <div>
              <table id="export-status">
                
              </table>
          
  @endslot
  @slot('action')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" id="data-export-button" class="btn btn-primary">Export</button>
  @endslot
</x-ModalPopUp>

@push('module-style')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css"> 
         <link rel="stylesheet" href="{{asset('js/datatable/datatable.css')}}">
        @if(isset($filterBlock))
        <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        @endif        
@endpush

@push('module-script')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('js/datatable/datatable.js')}}"></script>
    @if(isset($filterBlock))
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset('js/forms.js')}}" ></script>
    @endif
@endpush