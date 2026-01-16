$(document).ready(function() {
    $('.add-to-cart').click(function() {
      var productId = $(this).data('id');
  
      $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: { product_id: productId },
        success: function(response) {
          $('#cart-response').html(response);
        },
        error: function() {
          $('#cart-response').html('Something went wrong!');
        }
      });
    });
  });
  