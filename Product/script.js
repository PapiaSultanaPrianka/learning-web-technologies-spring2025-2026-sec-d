var unitPrice = 1000;

var quantityInput = document.getElementById("quantity");
var totalInput = document.getElementById("total");

quantityInput.addEventListener("input", function(){

    var quantity = parseInt(quantityInput.value);

    if(quantity < 0){
        quantity = 0;
        quantityInput.value = 0;
    }

    var total = unitPrice * quantity;

    totalInput.value = total;

    if(total > 1000){
        alert("You are eligible for a gift coupon!");
    }

});