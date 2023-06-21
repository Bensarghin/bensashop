$(document).ready(function() {
    // Attach a click event listener to each of the other images
    $('.variants-img').on('click', function() {
        $('.variants-img').css({
            'border' : '1px solid #f9f3f0',
            'border-radius' : '3px'
          });
          // Get the source of the clicked image
          var clickedSrc = $(this).attr('src');
          $(this).css({
            'border' : '2px solid #00425a'
          });
          
          // Set the main image source to the clicked image source
          $('#main-img').attr('src', clickedSrc);
      });

    // Initialize Slick carousel
    $('#small-images-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        vertical: true,
        verticalSwiping: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                slidesToShow: 6
                }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 3
                }
                }
            ]
        });

    // Load cart items on page load
    loadCartItems();
  
    // Handle add to cart button click
    $(document).on('click', '.add-to-cart', function(e) {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      e.preventDefault();
      var productId = $(this).data('product-id');
      
      $.ajax({
        url: '/api/cart/add',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
          product_id: productId
        },
        success: function(response) {
            loadCartItems();
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  
    // Function to load cart items from server
    function loadCartItems() {
      $.ajax({
        url: '/api/cart',
        method: 'GET',
        success: function(response) {
            updateCartItems(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
    // function to remove item from cart
    $(document).on('click', '.remove-cart', function(e) {
        e.preventDefault(); 
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var product_id = $(this).data('product-id');
        $.ajax({
          url: '/api/cart/remove/',
          method:'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          data:{product_id:product_id},
          success: function() {
            loadCartItems();
          },
          error:function(err) {
            console.log(err);
          }
        })
    });
    // Function to update cart items on the page
    function updateCartItems(response) {
        var cartData = response;
        var cartElement = $('#CartData');
        cartElement.empty();
        var itemHTML = "";
        var totalPrice = 0;
        
        cartElement.empty();
        
        if (Object.keys(cartData).length > 0) {
            itemHTML += '<table class="table">';
            for (var key in cartData) {
                if (cartData.hasOwnProperty(key)) {
                    var item = cartData[key];
                    totalPrice += item.price * item.quantity;
                    itemHTML += 
                        '<tr>'+
                        '<td>'+item.name+'</td>'+
                        '<td>'+item.price*item.quantity+' د.م</td>'+
                        '<td>كمية:'+item.quantity+'</td>'+
                        '<td><a href="#" class="btn btn-danger btn-sm remove-cart" data-product-id="'+item.id+'"><i class="fa-solid fa-trash"></i></a></td>'+
                        '</tr>';
                }
            }
            
            itemHTML += '<tr class="bg-striped">'+
            '<td><b>مجموع</b></td>'+
            '<td colspan="3"><b>'+totalPrice+' د.م </b></td>'+
            '</tr></table>';
            cartElement.append(itemHTML);
            $('.shopping-cart').append('<span class="count"></span>');
            $('.count').text(Object.keys(cartData).length );
        } else {
          var parentElement = $('.shopping-cart');
          var childElement = parentElement.find("span");
          childElement.remove();
            var emptyMessage = '<h5 class="text-center">سلة المشتريات فارغة</h5>';
            cartElement.append(emptyMessage);
        }
    }
  });
  