let rppModel = null;
document.addEventListener("DOMContentLoaded", () => {
  rppModel = new bootstrap.Modal("#rppModel");
});

const verificationcode = () => {
  rppModel.show();
  setTimeout(() => {
    window.location.href = "/";
  }, 1000);
};

document.addEventListener("DOMContentLoaded", function() {
  var countdownElement = document.getElementById('countdown');
  var countdownTime = 5 * 60; 

  function updateCountdown() {
      var minutes = Math.floor(countdownTime / 60);
      var seconds = countdownTime % 60;
      countdownElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

      if (countdownTime > 0) {
          countdownTime--;
          setTimeout(updateCountdown, 1000);
      } else {
          countdownElement.textContent = 'Expired!';
          countdownElement.classList.add('vc-expired');
      }
  }

  updateCountdown();
});