@extends('frontend.mastaring.master')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Checkout</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                    </li>
                                    <li class="breadcrumb-item active">Checkout
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="bs-stepper checkout-tab-steps">
                    <!-- Wizard starts -->
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#step-cart">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Cart</span>
                                    <span class="bs-stepper-subtitle">Your Cart Items</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-address">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="home" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Address</span>
                                    <span class="bs-stepper-subtitle">Enter Your Address</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-payment">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="credit-card" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Payment</span>
                                    <span class="bs-stepper-subtitle">Select Payment Method</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- Wizard ends -->

                    <div class="bs-stepper-content">
                        <!-- Checkout Place order starts -->
                        <div id="step-cart" class="content">
                            <div id="place-order" class="list-view product-checkout">
                                <!-- Checkout Place Order Left starts -->
                                
                                    
                                
                                <div class="checkout-items"> 
                                    @foreach ($checkout as $item)
                                    <div class="card ecommerce-card">
                                        <div class="item-img">
                                            <a href="app-ecommerce-details.html">
                                                <img src="{{ asset('uploads/product/'.$item->image) }}" alt="img-placeholder" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <h6 class="mb-0">
                                                    <a href="app-ecommerce-details.html" class="text-body">{{ $item->name }} </a>
                                                </h6>
                                                <span class="item-company">By <a href="javascript:void(0)" class="company-name">Sharp</a></span>
                                                {{-- <div class="item-rating">
                                                    <ul class="unstyled-list list-inline">
                                                @for($i=1; $i<=5; $i++)
                                                     @if($i<=$item->star)
                                                      <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                    @else
                                                   <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i>
                                                @endif
                                                      @endfor 
                                                    </ul>
                                                </div> --}}
                                            </div>
                                            <span class="text-success mb-1">In Stock</span>
                                            <div class="item-quantity">
                                                {{-- <span class="quantity-title">Qty:</span>
                                                <div class="input-group quantity-counter-wrapper">
                                                    <input type="text" class="quantity-counter" value="1" />
                                                </div> --}}

                                                {{-- <div class="cart-item-qty">
                                                    <div class="input-group">
                                                        <input min="1" class="form-control quantity{{ $item->id }}" type="number" id=""  value="1">
                                                        <button value="{{ $item->id }}" class="increase_product btn btn-primary">Add</button>
                                                        <a href="{{ route('remove-item',$item->id) }}"  class="ml-1 ">X</a>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <span class="delivery-date text-muted">Delivery by, Wed Apr 30</span>
                                            <span class="text-success">6% off 3 offers Available</span>
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-cost">
                                                    <h4 class="item-price">${{ $item->price }}</h4>
                                                </div>
                                            </div>
                                            <a href="{{ route('remove-item',$item->id) }}" type="button" class="btn btn-light mt-1 remove-wishlist">
                                                <i data-feather="x" class="align-middle mr-25"></i>
                                                <span>Remove</span>
                                            </a>
                                            <button type="button" class="btn btn-primary btn-cart move-cart">
                                                <i data-feather="heart" class="align-middle mr-25"></i>
                                                <span class="text-truncate">Add to Wishlist</span>
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <!-- Checkout Place Order Left ends -->

                                <!-- Checkout Place Order Right starts -->
                                <div class="checkout-options">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="section-label mb-1">Options</label>
                                        {{-- <form action="{{ route('cupon.discount',Auth::user()->id)}}" method="POST">
                                                @csrf --}}
                                            <div class="coupons input-group input-group-merge">
                                                <input type="text" class="form-control cuponvalue" placeholder="Coupons" aria-label="Coupons" aria-describedby="input-coupons" name="cupon_code" />
                                                <div class="input-group-append">
               
                                                    <button   class="btn input-group-text text-primary" id="input-coupons">Apply</button>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                            <hr />
                                            <div class="price-details">
                                                <h6 class="price-title">Price Details</h6>
                                                <ul class="list-unstyled">
                                                    <li class="price-detail">
                                                        <div class="detail-title">Total MRP</div>
                                                        <div class="detail-amt ">${{ $totalprice }}</div>
                                                    </li>
                                                    <li class="price-detail">
                                                        <div class="detail-title"> Discount</div>
                                                        <div class="detail-amt discount-amt text-success discount-amount"></div>
                                                    </li>
                                                    {{-- <li class="price-detail">
                                                        <div class="detail-title">Estimated Tax</div>
                                                        <div class="detail-amt">$1.3</div>
                                                    </li> --}}
                                                    {{-- <li class="price-detail">
                                                        <div class="detail-title">EMI Eligibility</div>
                                                        <a href="javascript:void(0)" class="detail-amt text-primary">Details</a>
                                                    </li> --}}
                                                    <li class="price-detail">
                                                        <div class="detail-title">Delivery Charges</div>
                                                        <div class="detail-amt discount-amt text-success charge">Free</div>
                                                    </li>
                                                </ul>
                                                <hr />
                                                <ul class="list-unstyled">
                                                    <li class="price-detail">
                                                        <div class="detail-title detail-total">Total</div>
                                                        <div class="detail-amt font-weight-bolder total">${{ $totalprice }}</div>
                                                    </li>
                                                </ul>
                                                <a href="{{ route('user.address') }}" class="btn btn-primary btn-block btn-next place-order">Place Order</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout Place Order Right ends -->
                                </div>
                            </div>
                            <!-- Checkout Place order Ends -->
                        </div>
                        <!-- Checkout Customer Address Starts -->
                        <div id="step-address" class="content">
                            {{-- <form action="{{ route('customer-information') }}"
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
                                                    <input type="text" id="checkout-name" class="form-control" name="name" placeholder="Enter Your Name" />
                                                </div>
                                                @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-number">Mobile Number:</label>
                                                    <input type="number" id="checkout-number" class="form-control" name="phone" placeholder="0123456789" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-apt-number">Flat, House No:</label>
                                                    <input type="number" id="checkout-apt-number" class="form-control" name="house_no" placeholder="9447 Glen Eagles Drive" />
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-city">Town/City:</label>
                                                    <input type="text" id="checkout-city" class="form-control" name="town" placeholder="Tokyo" />
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-state">State:</label>
                                                    <input type="text" id="checkout-state" class="form-control" name="state" placeholder="California" />
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
                                                <button  class="btn btn-primary btn-next delivery-address" type="submit">Save And Deliver Here</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Checkout Customer Address Left ends -->

                                <!-- Checkout Customer Address Right starts -->
                                <div class="customer-card">
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout Customer Address Right ends -->
                            </form> --}}
                        </div>
                        <!-- Checkout Customer Address Ends -->

                        <!-- Checkout Payment Starts -->
                        <div id="step-payment" class="content">
                            {{-- <form  class="list-view product-checkout" >
                                <div class="payment-type">
                                    <div class="card">
                                        <div class="card-header flex-column align-items-start">
                                            <h4 class="card-title">Payment options</h4>
                                            <p class="card-text text-muted mt-25">Be sure to click on correct payment option</p>
                                        </div>
                                       

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="panel panel-default credit-card-box">
                                                        <div class="panel-heading display-table" >
                                                                <h3 class="panel-title" >Payment Details</h3>
                                                        </div>
                                                        <div class="panel-body">
                                            
                                                            @if (Session::has('success'))
                                                                <div class="alert alert-success text-center">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                                    <p>{{ Session::get('success') }}</p>
                                                                </div>
                                                            @endif
                                            
                                                            {{-- <form 
                                                                    role="form" 
                                                                    action="{{ route('stripe.post') }}" 
                                                                    method="post" 
                                                                    class="require-validation"
                                                                    data-cc-on-file="false"
                                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                                    id="payment-form">
                                                                @csrf
                                            
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 form-group required'>
                                                                        <label class='control-label'>Name on Card</label> <input
                                                                            class='form-control' size='21' type='text'>
                                                                    </div>
                                                                </div>
                                            
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 form-group card required'>
                                                                        <label class='control-label'>Card Number</label> <input
                                                                            autocomplete='off' class='form-control card-number' size='20'
                                                                            type='text'>
                                                                    </div>
                                                                </div>
                                            
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                            type='text'>
                                                                    </div>
                                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                        <label class='control-label'>Expiration Month</label> <input
                                                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                                                            type='text'>
                                                                    </div>
                                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                        <label class='control-label'>Expiration Year</label> <input
                                                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                                            type='text'>
                                                                    </div>
                                                                </div>
                                            
                                                                <div class='form-row row'>
                                                                    <div class='col-md-12 error form-group hide'>
                                                                        <div class='alert-danger alert'>Please correct the errors and try
                                                                            again.</div>
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                                                                       
                                                                    </div>
                                                                </div>
                                                                    
                                                            </form> --}}
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>

                                        {{-- End Stripe  --}}




                                    </div>
                                </div>
                                <div class=" checkout-options">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Price Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled price-details">
                                                <li class="price-detail">
                                                    <div class="details-title ">Price of  items</div>
                                                    <div class="detail-amt ">
                                                        <strong class="itemprice">$699.30</strong>
                                                    </div>
                                                </li>
                                                <li class="price-detail">
                                                    <div class="details-title">Delivery Charges</div>
                                                    <div class="deliverycharge detail-amt discount-amt text-success">Free</div>
                                                </li>
                                            </ul>
                                            <hr />
                                            <ul class="list-unstyled price-details">
                                                <li class="price-detail">
                                                    <div class="details-title">Amount Payable</div>
                                                    <div class="detail-amt font-weight-bolder payble">$699.30</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        <!-- Checkout Payment Ends -->
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection

