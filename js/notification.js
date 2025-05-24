document.addEventListener('DOMContentLoaded', function () {
 const errorAlert = document.getElementById('errorAlert');
 const successAlert = document.getElementById('successAlert');

 if (errorAlert) {
  errorAlert.style.display = 'block';
 }
 if (successAlert) {
  successAlert.style.display = 'block';
 }
});

function closeAlert(button, type) {
 const alert = button.parentElement;
 alert.style.animation = 'slideOut 0.3s forwards';
 setTimeout(() => {
  alert.remove();
 }, 300);
 return false;
}