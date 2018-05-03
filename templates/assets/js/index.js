document.addEventListener('DOMContentLoaded', function(event) {
  const menu = document.getElementById('responsive-menu');
  menu.addEventListener('click', e => menu.classList.toggle('open'));
});
