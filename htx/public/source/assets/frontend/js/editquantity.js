// ------------------------------chỉnh sửa tăng giảm số lượng ở giỏ hàng-------------------

// Lấy phần tử input và nút button
const quantityInput = document.querySelector('.quantity');
const minusBtn = quantityInput.querySelector('.minus-btn');
const plusBtn = quantityInput.querySelector('.plus-btn');
const quantityNum = quantityInput.querySelector('.quantity-num');

// Xử lý sự kiện click cho nút tăng
plusBtn.addEventListener('click', function() {
  let currentValue = parseInt(quantityNum.value);
  quantityNum.value = currentValue + 1;
});

// Xử lý sự kiện click cho nút giảm
minusBtn.addEventListener('click', function() {
  let currentValue = parseInt(quantityNum.value);
  if (currentValue > 1) {
    quantityNum.value = currentValue - 1;
  }
});