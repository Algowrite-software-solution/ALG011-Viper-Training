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
