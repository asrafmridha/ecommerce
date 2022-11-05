jQuery(document).ready(function(){
    // alert('hlw');
    quantity();
    cartshow();

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

    function cartshow(){
        $.ajax({
            type: "GET",
            url: "/cartshow",
            dataType: "JSON",
            success: function (response) {
                
               var cart="";
               var subtotal=0;
               jQuery('.cart_count').text(response.count);
               $.each(response.alldata, function (key, item) {
                subtotal+=item.price;
                // alert(subtotal);
                
            });
                // jQuery('.datashow').html(cart);
                jQuery('.subtotal').text(subtotal);
                // 
              
              
               
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
            type: "GET",
            url: "/addcart/"+product_id,
            dataType: "JSON",
            success: function (response) {
                
                    toastr.success('Added Item In Your Cart 🛒');
                    quantity();
                
               
            }
        });   
    });

    // for details page add cart 
    $(document).on('input', '#coin', function(){
        alert('hlw');
        var coins = $("#coins").val();
        $("#reward").text(coins);
    })

    jQuery('#coin').click(function(){

       alert('hlw');
    });
        
   

 

  
    
});