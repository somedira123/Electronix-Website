if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    var cartTotalPrize = document.getElementsByClassName('cart-total-prize')[0].innerText
    for (var i=0; i<removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i=0; i<quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove('')
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-products')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i=0; i<cartRows.length; i++) {
        var cartRow = cartRows[i]
        var prizeElement = cartRow.getElementsByClassName('cart-prize')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var totalPrize = parseFloat(prizeElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        total = total + (totalPrize * quantity)
    }
    total = Math.round(total * 100) / 100
    var cartTotalPrize = document.getElementsByClassName('cart-total-prize')[0].innerText = '$' + total
}