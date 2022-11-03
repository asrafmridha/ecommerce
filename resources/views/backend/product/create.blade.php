@extends('backend.mastaring.master')
 
@section('product','active')

@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Product</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.store') }}"  method="POST" enctype="multipart/form-data"  >
                    @csrf

                    <div class="col-12">
                        <div class="form-group">
                            <label for="image">Product image <small class="text-danger">*(image dimension must be 350 X 250 )</small></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose image</label>
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
                            <label for="product_name"> {{ __('Product Name') }} <span class="text-danger">*</span></label>
                            <input type="text" id="product_name" class="form-control" name="product_name" placeholder="Enter Product name" value="{{ old('product_name') }}" />
                        </div>
                        @error('product_name')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="product_title"> {{ __('Product Title') }} <span class="text-danger">*</span></label>
                            <input type="text" id="product_title" class="form-control" name="product_title" placeholder="Enter Product Title" value="{{ old('product_title') }}" />
                        </div>
                        @error('product_title')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="short_description">Short Description <small class="text-danger">*</small></label>
                            <div>
                               <textarea name="short_description" placeholder="Enter Short Descriptionn" class="form-control">{{old('short_description')}}</textarea>
                            </div>
                        </div>
                        @error('short_description')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="product_price"> {{ __('Product Price') }} <span class="text-danger">*</span></label>
                            <input type="number" id="product_price" class="form-control" name="product_price" placeholder="Enter Product Price" value="{{ old('product_price') }}" />
                        </div>
                        @error('product_price')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="status"> {{ __('Product Status') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="status">
                                <option value="">-----Select Status-----</option>
                               <option value="1"> Active</option>
                               <option value="2"> Inactive</option> 
                            </select>
                        </div>
                        @error('status')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                    <button type="submit" class="form-control mt-1 btn-purchaseAdd btn btn-primary"> Save</button>
                    </div>

                </form>              
            </div>
        </div>
    </div>
</div>                


@endsection