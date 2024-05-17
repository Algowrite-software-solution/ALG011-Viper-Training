<!-- Verification Page (vp) -->
<!-- section 1 -->
<section class="vh-100">
       <div class="col-12 h-100">
              <div class="d-flex flex-column flex-md-row m-0  h-100">
                     <div class="vp-left-panel gap-4 col-12 col-md-6 py-5 d-flex flex-column justify-content-center align-items-center order-md-1 order-2">
                            <div class="vp-rounded-border"></div>
                            <h2>Verification Code</h2>
                            <div class="d-flex flex-row gap-4 justify-content-center">                                   
                                   <input type="text" class="vp-input" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                   <input type="text" class="vp-input" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                   <input type="text" class="vp-input" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                   <input type="text" class="vp-input" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                            </div>
                            <button type="submit" onclick="verificationcode()"  class="alg-btn vp-input-width">Continue</button>
                     </div>
                     <div class="vp-right-panel col-12 col-md-6 bg-primary d-flex flex-column justify-content-center p-5 alg-text-light gap-2 order-md-2 order-1">
                            <div class="vp-dot"></div>
                            <h1>Algowrite</h1>
                            <p>Unleashing the magic of technology...!</p>
                     </div>
              </div>
       </div>
       <div class="modal" tabindex="-1" id="rppModel">
              <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content vp-model-body p-5 rounded-5 d-flex flex-column justify-content-center align-items-center">
                            <div class="vp-check"></div>
                            <span class="fw-bold fs-2">verified</span>
                     </div>
              </div>
       </div>
</section>