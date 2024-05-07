const btns = document.querySelectorAll('.show-more-btn');
  
  btns.forEach(function(btn) {
    const hiddenContent = btn.previousElementSibling;
    let isVisible = false;
    
    btn.addEventListener('click', function() {
      isVisible = !isVisible;
      
      if (isVisible) {
        hiddenContent.style.display = 'block';
        this.innerText = 'Ẩn nội dung';
      } else {
        hiddenContent.style.display = 'none';
        this.innerText = 'Xem chi tiết';
      }
    });
  });