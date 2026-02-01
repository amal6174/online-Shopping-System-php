


$(document).ready(function(){
    $(".addToCartBtn").click(function(){
        let btn  = $(this);

        let product = {
            p_id : btn.data("id"),
            p_name : btn.data("name"),
            p_image: btn.data("image"),
            p_price: btn.data("price"),
            quantity: 1

        };

        $.ajax({
            url : "add_to_cart.php",
            type: "POST",
            data: product,
            success: function(response){
                alert(response);
            }

        });



    });
});