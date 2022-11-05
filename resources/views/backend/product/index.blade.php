@extends('backend.mastaring.master')

{{-- Title --}}
@section('title')
    {{ config('app.name') }}
@endsection

{{-- Active Menu --}}
@section('product')
    active
@endsection




{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Product
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block d-sm-flex">
                    {{-- <h4 class="card-title">Team List ({{ $product->count() }})</h4> --}}
                    <div class="button-group-spacing">
                        <a href="{{ route('product.create') }}" class="btn btn-warning waves-effect w-100 w-sm-auto">+ Add New </a>
                       
                        <div id="all_actions" class="dropdown w-100 w-sm-auto d-none">
                            <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal" ><i data-feather='trash-2'></i> Delete</button>
                           
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                        </svg>
                                                        <h2 class="font-weight-normal mt-1">{{ __('Are you sure') }}?</h2>
                                                        <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                                                    </div>
                                                    <div class="modal-footer border-top-0 justify-content-center">
                                                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                            {{ __('Close') }}
                                                        </button>
                                                        <button id="delete_all" class="btn btn-danger waves-effect waves-float waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                

                                {{-- @if (havePermission('client','export'))
                                    <form action="{{ route('client.export') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="export_all" name="id">
                                        <button type="submit" class="dropdown-item" >Export</button>
                                    </form>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                            <div class="modal fade" id="add_client_modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ajouter une catégorie</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                         <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf 
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Create Team Info</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="image">Team Info Image <small class="text-danger">(Aspect ratio 36:35 is preferred for best visualization)</small></label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                                                    <label class="custom-file-label" for="image">Choose Image</label>
                                                                                </div>
                                                                            </div>
                                                                            @error('image')
                                                                                <div class="alert alert-danger">
                                                                                    <div class="alert-body">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="title">Title<small class="text-danger">*</small></label>
                                                                                <input type="text" value="{{ old('title') }}" class="form-control" id="title" name="title" placeholder="title">
                                                                            </div>
                                                                            @error('title')
                                                                                <div class="alert alert-danger">
                                                                                    <div class="alert-body">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="description">Short Description <small class="text-danger">*</small></label>
                                                                                <div>
                                                                                   <textarea name="description" placeholder="Enter Short Descriptionn" class="form-control">{{old('description')}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            @error('description')
                                                                                <div class="alert alert-danger">
                                                                                    <div class="alert-body">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                       
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        <!-- CSV Import Modal -->

                        {{-- @if (havePermission('client','import'))
                            <div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-labelledby="csvImportModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content position-relative"> 
                                        <form action="{{ route('client.import') }}" method="POST" id="importclientForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Import Categories</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group my-2">
                                                    <p class="form-label">Import Categories</p> <span id="importError" class="text-danger"></span>
                                                    <div class="custom-file cursor-pointer">
                                                        <input type="file" name="file" id="importclient"class="custom-file-input" required>
                                                        <label class="custom-file-label">{{ __('Choose file') }} ...</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12"> 
                                                        <div class="table-responsive"> 
                                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            {{ __('Table Header ') }}
                                                                        </th> 
                                                                        <th>
                                                                            {{ __('CSV Header') }} 
                                                                        </th> 
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="clientCsvHeader">  

                                                                </tbody>
                                                            </table>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                                <button type="submit" id="importSubmitButton" class="btn btn-primary">{{ __('Save changes') }}</button>
                                            </div> 
                                        </form> 
                                    </div>
                                </div>
                            </div> 
                        @endif --}}
                    
                </div>
                <div class="card-body">
                    <form action="{{ route('product.filter') }}" method="GET">
                        <div class="row align-items-end">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->start_date)->format('Y-m-d') }}" @endisset id="start_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="start_date">End Date <span class="text-danger">*</span></label>
                                    <input type="date" @isset(request()->start_date) value="{{ \Carbon\Carbon::parse(request()->end_date)->format('Y-m-d') }}" @endisset name="end_date" id="end_date" class="form-control flatpickr-human-friendly" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect w-100 w-sm-auto">Filter</button>
                                    @if(Route::is('product.dateFilter'))
                                        <a href="{{ route('product.index') }}" class="btn btn-danger waves-effect mt-1 mt-sm-0 w-100 w-sm-auto">Clear</a>
                                    @endif 
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-md-center">
                            <div class="col-md">
                                <div class="form-group mb-md-0">
                                    <div class="input-group">
                                        <input type="search" class="form-control table_search" placeholder="Search Here">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i data-feather='search'></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-auto">
                                @include('includes.pagination', ['variables' => $product, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]])
                            </div> --}}
                        </div>
                    </form>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input main_checkbox" id="all-select">
                                            <label class="custom-control-label" for="all-select"></label>
                                        </div>
                                    </th>
                                    <th>Actions</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Status</th>
                                    <th>Product Star</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $product)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input all_checkbox" name="select_individual[]" id="single-select-{{ $product->id }}">
                                                <label class="custom-control-label" for="single-select-{{ $product->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">

                                                    {{-- @if (havePermission('client','edit')) --}}
                                                        <a href="{{ route('product.edit',$product->id) }}" class="dropdown-item">
                                                            <i data-feather='edit'></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" >
                                                            @csrf 
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td><img src="{{ asset('uploads/product/'.$product->image) }}" alt="">
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>
                                            @if($product->status==1)
                                            <a href="" class="btn btn-success waves-effect w-100 w-sm-auto">Active </a>
                                            @else
                                            <a href="" class="btn btn-warning waves-effect w-100 w-sm-auto">Inactive </a>
                                            @endif

                                        </td>
                                        <td>{{ $product->star }}</td>
                                        <td>{!! $product->short_description !!}</td>
                                    </tr>
                                        {{-- @if (havePermission('client','edit')) --}}
                                            <div class="modal fade" id="edit_service_{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ajouter une catégorie</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('product.update',$product->id) }}" method="POST">
                                                            @csrf 
                                                            <div class="modal-body">     
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                    {{-- @include('includes.pagination' , ['variables' => $product, 'data_variables' => ['start_date' => request()->start_date,'end_date' => request()->end_date]]) --}}
                </div>            
            </div>
        </div>
    </div>
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            var ids = [];

            @if($errors->has('name') || $errors->has('email') || $errors->has('phone') || $errors->has('address'))
                $('#add_client_modal').modal('show');
            @endif

            @if($errors->has('edit_name') || $errors->has('edit_email') || $errors->has('edit_phone') || $errors->has('edit_address'))
                $("#edit_client_{{ session('id') }}").modal('show');
            @endif

            // Select All Checkbox Features
            $('#all-select').change(function(){
                 ids = [];
                 // Get all the id 
                if($(this).is(":checked")){
                    $('.custom-control-input').prop('checked', true);
            
                   
                    $('.all_checkbox').each(function(){
                        ids.push($(this).attr('id').split('-')[2]);
                    });

                    if(ids.length == 0){
                        $('#all_actions').removeClass('d-inline-block');
                        $('#all_actions').addClass('d-none');
                    }
                    else
                    {
                        $('#all_actions').removeClass(' d-none');
                        $('#all_actions').addClass('d-inline-block');
                        $('#export_all').val(ids);
                    }
                    // Delete all
                    $("#delete_all").on('click', function(){

                        $.ajax({
                            url: "{{ route('product.mass.delete') }}",
                            type: 'POST',
                            data: {
                                ids: ids,
                            },
                            success: function(data){
                                if(data.success == 'done'){
                                    window.location.reload();
                                }
                            }
                        });

                    });
                    


                }else{
                    $('.custom-control-input').prop('checked', false);
                    $('#all_actions').addClass('d-none');
                    $('#all_actions').removeClass('d-inline-block');
                }
            });

            // Select Individual Checkbox Features
            $('.all_checkbox').change(function(){
                 ids = [];
                $('.all_checkbox').each(function(){
                    if($(this).is(":checked")){
                        ids.push($(this).attr('id').split('-')[2]);
                    }
                });
                if(ids.length == 0){
                    $('#all_actions').removeClass('d-inline-block');
                    $('#all_actions').addClass('d-none');
                }
                else
                {
                    $('#all_actions').removeClass(' d-none');
                    $('#all_actions').addClass('d-inline-block');
                    $('#export_all').val(ids);

                    // Delete trigger

                    $("#delete_all").on('click', function(){

                        $.ajax({
                            url: "{{ route('product.mass.delete') }}",
                            type: 'POST',
                            data: {
                                ids: ids,
                            },
                            success: function(data){
                                if(data.success == 'done'){
                                    window.location.reload();
                                }
                            }
                        });

                    });
                }
            });
            
            // client Import 
            $('body').on('change','#importclient',function(){ 
                var form_data = new FormData($('#importclientForm')[0]); 

                $.ajax({
                    url: "", 
                    type: "post",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.data){
                            $('#importSubmitButton').removeClass('d-none'); 
                            $('#importError').addClass('d-none'); 
                            $('#clientCsvHeader').html(response.data);
                        }
                        if(response.error){
                            $('#importSubmitButton').addClass('d-none'); 
                            $('#importError').removeClass('d-none'); 
                            $('#importError').text(response.error); 
                        }
                    }, 
                });
            });

            // Table Search 
            $('.table_search').on('input', function(){
                var tableSearchValue = $(this).val();
                $(this).closest(".card-body").find(".table tbody tr").each(function(){
                    if($(this).text().search(new RegExp(tableSearchValue, "i")) < 0){
                        $(this).hide();
                    }
                    else{
                        $(this).show();
                    }
                });
            });
        });

    </script>

