$(document).ready(function() {
  
  // preview multiple images upload
  $('#image-files').on('change', function() {
        $('#image-preview').empty();
        $('#image-preview').append('<div class="row"></div>');
        for (var i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview > .row').append('<div class="col-sm-3"> <img src="' + e.target.result + '" class="img-thumbnail" width="250" height="250"></div>');
            }
            reader.readAsDataURL(this.files[i]);
        }
    });
    

  });

// preview single image upload 
var loadImage = function(event) {
  var output = document.getElementById('img-preview');
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
  }
};

// custom product input qantity count
var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount-1);
  }
});