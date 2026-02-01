$(document).ready(function(){

// plus
$(document).on("click",".plus",function(){

    let cart_id= $(this).data("id");

    updateQty(cart_id,"plus");
});


$(document).on("click",".minus",function(){
    let cart_id = $(this).data("id");
    updateQty(cart_id,"minus");

});


function updateQty(cart_id,action){
    $.ajax({
        url: "update_cart_qty.php",
        type: "POST",
        data:{
               cart_id:cart_id,
               action:action
            },
        success: function(res){
              if(res.status === "success"){

                $("#qty-"+cart_id).text(res.qty);
                $("#totalAmount").text(res.total); 
                
                
               
              }

        }
    });
}






});