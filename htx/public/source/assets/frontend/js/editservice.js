
// dropdown chọn địa điểm
function toggleDropdown() {
    var dropdownMenu = document.getElementById("myDropdown");
    if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
    } else {
      dropdownMenu.style.display = "block";
    }
  }
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropdown-toggle')) {
      var dropdowns = document.getElementsByClassName("dropdown-menu");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.style.display === "block") {
          openDropdown.style.display = "none";
        }
      }
    }
  };


// lấy ngày hiện tại trên lịch
// Lấy ngày hiện tại
var today = new Date().toISOString().split('T')[0];

// Thiết lập giá trị mặc định cho date picker
document.getElementById('datePicker').value = today;
