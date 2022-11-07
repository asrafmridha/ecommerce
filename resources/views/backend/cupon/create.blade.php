@extends('backend.mastaring.master')
 
@section('cupon','active')

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
                <form action="{{ route('cupon.store') }}"  method="POST">
                    @csrf

                    

                    <div class="col-12">
                        <div class="form-group">
                            <label for="cupon_code"> {{ __('Cupon Code') }} <span class="text-danger">*</span></label>
                            <input type="text" id="cupon_code" class="form-control" name="cupon_code" placeholder="Enter Product name" value="{{ old('cupon_code') }}" />
                        </div>
                        @error('cupon_code')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="discount"> {{ __('Cupon Discount') }} <span class="text-danger">*</span></label>
                            <input type="number" id="discount" class="form-control" name="discount" placeholder="Enter Cupon Discount Here" value="{{ old('discount') }}" />
                        </div>
                        @error('discount')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="discount_amount"> {{ __('Cupon Discount Amount') }} <span class="text-danger">*</span></label>
                            <input type="number" id="discount_amount" class="form-control" name="discount_amount" placeholder="Cupon discount Amount" value="{{ old('discount_amount') }}" />
                        </div>
                        @error('discount_amount')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label for="start_at"> {{ __('Start Date ') }} <span class="text-danger">*</span></label>
                            <input type="date" id="start Date" class="form-control" name="start_at" placeholder="Cupon discount Amount" value="{{ old('start_at') }}" />
                        </div>
                        @error('start_at')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="end_at"> {{ __('End Date ') }} <span class="text-danger">*</span></label>
                            <input type="date" id="End Date" class="form-control" name="end_at" placeholder="Cupon discount Amount" value="{{ old('end_at') }}" />
                        </div>
                        @error('end_at')
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="product_id"> {{ __('Product id') }} <span class="text-danger">*</span></label>
                            <input min="0" type="text" id="product_id" class="form-control" name="product_id" placeholder="Enter Product Price" value="{{ old('product_id') }}" />
                        </div>
                        @error('product_id')
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