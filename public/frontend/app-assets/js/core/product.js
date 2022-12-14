jQuery(document).ready(function(){
    // alert('hlw');
    quantity();
    cartshow();
    cartcount();

    function quantity(){

        $.ajax({
            type: "GET",
            url: "/countqnt",
            dataType: "JSON",
            success: function (response) {
                jQuery(".cartcount").text(response.data);
            }
        });
    }

    function cartcount(){
        var subtotal=0;
        $.ajax({
            type: "GET",
            url: "/cart/countqnt",
            dataType: "JSON",
            success: function (response) { 
               
                // if(response.status==success){
                    jQuery('.subtotal').text(response.totalamount);
                    jQuery('.ipsubtotal').text(response.totalamount); 
                // }
                // if(response.ip_status==success){
                //     console.log(response.totalamount);
                //     jQuery('.ipsubtotal').text(response.totalamount); 
                // }    
            }
        });
    }
    function cartshow(){
        $.ajax({
            type: "GET",
            url: "/cartshow",
            dataType: "JSON",
            success: function (response) {
               var cart="";
            //    var subtotal=0;
               jQuery('.cart_count').text(response.count);
               $.each(response.alldata, function (key, item) {
                subtotal+=item.price;
            });   
                jQuery('.subtotal').text(subtotal);
            }
        });   
    }

    $('.addtocart').click(function (e) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id =jQuery(this).val();
        //    alert(product_id);
        $.ajax({
            type: "POST",
            url: "/addcart/"+product_id,
            dataType: "JSON",
            success: function (response) {
                if(response.status==404){
                    toastr.error(response.error);
                }
                else{
                    // alert(response.cartcount) ;
                    toastr.success('Added Item In Your Cart ????');
                    location.reload();
                }
                if(response.new_status=='success'){
                    toastr.success('Added Item In Your Cart ????');
                    location.reload();
                }
                
            }
        });   
    });

    // for details page add cart 
    $(document).on('input', '#coin', function(){
        // alert('hlw');
        var coins = $("#coins").val();
        $("#reward").text(coins);
    })

    jQuery('#coin').click(function(){

    //    alert('hlw');
    });

    // jQuery('.plusproduct').click(function(){
    //     var id = $(this).attr('id');

    //     alert(id);
        

    // });

    // jQuery('.minusproduct').click(function(){
    //     var id=jQuery('.quantity').val();
    //     alert(id);

    // });
        
    // $('#cc').on('input', function() {
    //     var number =$(this).val()
    //     alert (number);
    //     // alert('hlw');
    //     $('#mirror').text($('#alice').val());
    //   });
        
    $('.increase_product').click(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id=jQuery(this).val();
        var quantity =$('.quantity'+id).val();
        // alert(quantity);
        $.ajax({
            type: "POST",
            url: "/quantity/increase/"+id,
            data:{
              quantity:quantity
            },
            dataType:"JSON",
            success: function (response) {
                if(response.status=='failed'){
                    // console.log(response.quantity);
                    toastr.error(response.quantity); 
                    toastr.success(response.available); 

                }
                else{
                    // alert(response.price);

                    // console.log(response.price);
                    $('.pricetotal'+id).text(response.price);
                    cartcount();
                    // location.reload(); 
                }                
            }
        });
    });

    $('#input-coupons').click(function(){
        var totalmrp=$('.totalmrp').val();
        // alert(totalmrp);
       
        var cuponvalue=$('.cuponvalue').val();
        $.ajax({
            type: "GET",
            url: "/cupon/apply/"+cuponvalue,
            // data: "data",
            dataType: "JSON",
            success: function (response) {
                if(response.cuponamount){
                         
                  var discountamount=  $('.discount-amount').text(response.cuponamount);
                //   console.log(discountamount);
                   var totalmrp= $('.totalmrp').text(response.data);
                  var charge=  $('.charge').text(response.charge);

                //   var v= parseInt(discountamount)+parseInt(charge);

                  var v=(response.cuponamount+response.charge);
                  var total=(response.data-v);
                //   discount + item orginal price 
                  var itemprice=(response.data-response.cuponamount);
                //  alert(response.data);
                  if(response.data<total){
                    toastr.error('this token is not for this product');
                    $('.discount-amount').text('');
                    //   $('.charge').text('');
                      $('.total').text(response.data);          
                  }
                    $('.total').text(total);
                    $('.itemprice').text(itemprice);
                    $('.deliverycharge').text(response.charge);
                    $('.payble').text(total);
                    // $('.user_amount').val('asraf');
                   
                }
                else{     
                    toastr.error(response.error);  
                      $('.discount-amount').text('');
                      $('.charge').text('');
                }
                 
                
            }
        });

    });

    $('.productdelete').on('click',function(){

        var id= $(this).val();
        $.ajax({
            type: "GET",
            url: "/remove/item/"+id,
            dataType: "JSON",
            success: function (response) {
                toastr.success(response.success); 
                location.reload(); 
            }
        });
    })

});