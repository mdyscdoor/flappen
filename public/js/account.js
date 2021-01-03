let isMenuOpen = false;
let menu = document.getElementById('user_menu');

document.addEventListener('DOMContentLoaded',function() {
  document.getElementById('user_name').addEventListener('click',function() {
    if(isMenuOpen == false) {
      menu.style.display = 'block';
      isMenuOpen = true;
    } else {
      menu.style.display = 'none';
      isMenuOpen = false;
    }
  })


});