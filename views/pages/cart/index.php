<div class="container-fluid container-md mt-4">
  <div class="row">
    <div class="col-lg-8">
      <?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/cart/cartItems.php' ?>
    </div>
    <div class="col-lg-4">
      <?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/cart/total.php' ?>
    </div>
  </div>

</div>

<script>
  function format_curency(num) {
    return String(num).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + 'đ';
  }

  function addMoreQuantity(id, defaultPrice, discount) {
    const quantityElement = $(`#cart-item-quantity-${id}`)
    const priceElement = $(`#cart-item-price-${id}`)
    const beforeDiscountElement = $(`#cart-item-before-discount-${id}`)
    const newQuantity = parseInt(quantityElement.val()) + 1
    if (newQuantity > 10 || newQuantity <= 0) return
    quantityElement.val(newQuantity);

    beforeDiscountElement.html(format_curency(defaultPrice * (newQuantity)))
    priceElement.html(format_curency(defaultPrice * (newQuantity) * (100 - discount) / 100))
    $.post('cart/set', {
      cartItemId: id,
      quantity: newQuantity
    })
    updateTotalPrice()
  }

  function subtractQuantity(id, defaultPrice, discount) {
    const quantityElement = $(`#cart-item-quantity-${id}`)
    const priceElement = $(`#cart-item-price-${id}`)
    const beforeDiscountElement = $(`#cart-item-before-discount-${id}`)
    const newQuantity = parseInt(quantityElement.val()) - 1
    if (newQuantity > 10 || newQuantity <= 0) return
    quantityElement.val(newQuantity);
    beforeDiscountElement.html(format_curency(defaultPrice * (newQuantity)))
    priceElement.html(format_curency(defaultPrice * (newQuantity) * (100 - discount) / 100))
    $.post('cart/set', {
      cartItemId: id,
      quantity: newQuantity
    })
    updateTotalPrice()
  }

  function removeCartItem(id) {
    $.post('cart/delete', {
      cartItemId: id
    }, () => location.reload())
    updateTotalPrice()
  }

  function updateTotalPrice() {
    let tempPrice = 0;
    let totalDiscount = 0;
    let listAmount = $('input[id^=cart-item-quantity-]').map((i, d) => parseInt(d.value))
    $('input[id^=cart-item-default-price-]').each(function(i, e) {
      tempPrice += parseInt(e.value) * parseInt(listAmount[i])
    })
    $('input[id^=cart-item-default-discount-]').each(function(i, e) {
      totalDiscount += parseInt(e.value) * parseInt(listAmount[i])
    })
    const totalPrice = tempPrice - totalDiscount

    $('#temporary-amount').html(format_curency(tempPrice))
    $('#total-price').html(format_curency(totalPrice))
    $('#total-discount').html('- ' + format_curency(totalDiscount))
  }

  updateTotalPrice()
</script>