<!-- Reset Password -->
<!-- section 1 -->
<section class="vh-100">
       <div class="col-12 h-100">
              <div class="d-flex flex-column flex-md-row m-0  h-100">
                     <div class="rpp-left-panel gap-4 col-12 col-md-6 py-5 d-flex flex-column justify-content-center align-items-center order-md-1 order-2">
                            <div class="rpp-rounded-border"></div>
                            <h2 class="fw-bold">Reset Password</h2>
                            <div class="d-flex flex-column gap-4 w-100 px-1 px-md-3 px-lg-5 rpp-input-width">
                                   <div class="alg-text-primary fw-bold px-4">
                                          <label class="ps-4" for="password">Password</label><br>
                                          <input type="password" class="alg-input" id="password" placeholder="Create a strong password..." required>
                                   </div>
                                   <div class="alg-text-primary fw-bold px-4">
                                          <label class="ps-4" for="retypePassword">Retype Password</label><br>
                                          <input type="password" class="alg-input" id="retypePassword" placeholder="Retype the password..." required>
                                   </div>
                            </div>
                            <button onclick="reserPassword()" type="submit" class="alg-btn rpp-input-width">Reset</button>
                     </div>
                     <div class="rpp-right-panel col-12 col-md-6 bg-primary d-flex flex-column justify-content-center p-5 alg-text-light gap-2 order-md-2 order-1">
                            <div class="rpp-dot"></div>
                            <h1>Algowrite</h1>
                            <p>Unleashing <span class="text-danger">the</span> magic of technology...!</p>
                     </div>
              </div>
       </div>
       <div class="modal" tabindex="-1" id="rppModel">
              <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content rpp-model-body p-5 rounded-5 d-flex flex-column justify-content-center align-items-center">
                            <div class="rpp-check"></div>
                            <span class="fw-bold fs-2">Completed</span>
                     </div>
              </div>
       </div>
</section>