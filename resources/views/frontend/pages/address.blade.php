@extends('frontend.mastaring.master')
@section('content')
<br> <br><br> <br> <br> <br> <br> <br> <br>


<form action="{{ route('customer-information') }}"
method="POST"  class="list-view product-checkout"  >
@csrf
    <!-- Checkout Customer Address Left starts -->
    <div class="card">
        <div class="card-header flex-column align-items-start">
            <h4 class="card-title">Add New Address</h4>
            <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-2">
                        <label for="checkout-name">Full Name:</label>
                        <input value="{{ old('name') }}" type="text" id="checkout-name" class="form-control" name="name" placeholder="Enter Your Name" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-2">
                        <label for="checkout-number">Mobile Number:</label>
                        <input value="{{ old('number') }}" type="number" id="checkout-number" class="form-control" name="phone" placeholder="0123456789" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-2">
                        <label for="checkout-apt-number">Flat, House No:</label>
                        <input value="{{ old('house_no') }}" type="text" id="checkout-apt-number" class="form-control" name="house_no" placeholder="9447 Glen Eagles Drive" />
                    </div>
                </div>
               
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-2">
                        <label for="checkout-city">Town/City:</label>
                        <input value="{{ old('town') }}" type="text" id="checkout-city" class="form-control" name="town" placeholder="Tokyo" />
                    </div>
                </div>
               
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-2">
                        <label for="checkout-state">State:</label>
                        <input value="{{ old('state') }}" type="text" id="checkout-state" class="form-control" name="state" placeholder="California" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group mb-2">
                        <label for="add-type">Address Type:</label>
                        <select name="address_type" class="form-control" id="add-type">
                            <option value="Home">Home</option>
                            <option value="Work" >Work</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <button  class="btn btn-primary btn-next delivery-address" type="submit">Save And Deliver Here</button> <br> <br>
                    {{-- <a href="{{ route('user.payment') }}"  class="d-inline btn btn-primary btn-block btn-next delivery-address mt-2">
                        payment Now
                    </a> --}}
                  
                </div>
            </div>
        </div>
    </div>
</form>

    <!-- Checkout Customer Address Left ends -->

    <!-- Checkout Customer Address Right starts -->
    {{-- <div class="customer-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ Auth::user()->name }}</h4>
            </div>
            <div class="card-body actions">
                <p class="card-text mb-0">9447 Glen Eagles Drive</p>
                <p class="card-text">Lewis Center, OH 43035</p>
                <p class="card-text">UTC-5: Eastern Standard Time (EST)</p>
                <p class="card-text">202-555-0140</p>
                <button type="button" class="btn btn-primary btn-block btn-next delivery-address mt-2">
                    Deliver To This Address
                </button>

                <a  class="btn btn-primary btn-block btn-next delivery-address mt-2">
                    payment Now
                </a>
            </div>
        </div>
    </div> --}}
    <!-- Checkout Customer Address Right ends -->


@endsection