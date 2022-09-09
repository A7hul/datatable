@extends('layout')

@section('content')
    <section class="card">
        <div class="">
            <div id="append-filter-text"></div>
        </div>
        <div class="row p-2">
            <div class="col-md-12">
                <header class="card-header bold d-flex justify-content-between px-2 pt-2 pb-3">
                    <div class="page-header">
                        <h3>Add job</h3>
                    </div>

                    <div class="col-md-8 text-right">

                        <div class="row text-right">
                            <div class="col-md-12 text-right pt-1">

                            </div>
                            <div class="d-flex float-right px-2 pt-2 pb-3">
                                <a href="#" class="btn btn-sm btn-dark text-white"><i class="fa fa-plus"></i>
                                    {{ trans('headings.create-new') }}</a>

                            </div>
                        </div>
                        </form>
                    </div>

            </div>

            </header>
        </div>
    </div>

    @section('content')
        <div class="mt-5">
            <x-Datatable 
            id="tbl-banner"
            headers="title,image"
            createUrl="banner-create"
            filter="false"            
            create="false"            
            title="Banner" 
            {{-- checkbox="check" --}}
            hiddenHeaders="created by,status"
                     
        >          
      </x-Datatable>   
        </div>
    @endsection

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush

</section>

@endsection
