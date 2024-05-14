let rppModel = null;
document.addEventListener("DOMContentLoaded", () => {
  rppModel = new bootstrap.Modal("#rppModel");
});

const reserPassword = () => {
  // disable the button
  // send the request
  // on response:
  rppModel.show();
  setTimeout(() => {
    window.location.href = "/";
  }, 1000);
};
