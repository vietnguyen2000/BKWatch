<div class="container">
  <div class="row">
    <div class="col-8">
      <?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/cart/cartItems.php' ?>
    </div>

  </div>

</div>

<script>
  function format_curency(num) {
    return String(num).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + 'đ';
  }

  function addMoreQuantity(id, defaultPrice) {
    const quantityElement = $(`#cart-item-${id}`).find('input[type=number]')
    const priceElement = $(`#cart-item-price-${id}`)
    const newQuantity = parseInt(quantityElement.val()) + 1
    if (newQuantity > 10 || newQuantity <= 0) return
    quantityElement.val(newQuantity);
    priceElement.html(format_curency(defaultPrice * (newQuantity)))
    $.post('cart/set', {
      cartItemId: id,
      quantity: newQuantity
    })
  }

  function subtractQuantity(id, defaultPrice) {
    const quantityElement = $(`#cart-item-${id}`).find('input[type=number]')
    const priceElement = $(`#cart-item-price-${id}`)
    const newQuantity = parseInt(quantityElement.val()) - 1
    if (newQuantity > 10 || newQuantity <= 0) return
    quantityElement.val(newQuantity);
    priceElement.html(format_curency(defaultPrice * (newQuantity)))
    $.post('cart/set', {
      cartItemId: id,
      quantity: newQuantity
    })
  }

  function removeCartItem(id) {
    $.post('cart/delete', {
      cartItemId: id
    }, () => location.reload())

  }
</script>