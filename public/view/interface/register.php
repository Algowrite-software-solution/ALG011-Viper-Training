<!-- register page -->
<!-- author : Niman Wijerathna
     updated : 2024/05/30
     Description : this is the Register Page Layout-->
<!-- register page (rp) -->

<section class="rp-s1-container" id="register" aria-labelledby="register-heading">
    <div class="col col-left alg-bg-light-100">
        <div class="rp-s1-main-left">
            <h1 class="alg-bold-medium register-heading">Register</h1>
            <div class="rp-s1-sub-left">
                <form action="/register" method="post" role="form" aria-labelledby="register-heading" aria-describedby="register-desc">
                    <div class="input-group">
                        <label class="alg-bold alg-text-primary-dark" for="email">Email address</label>
                        <input class="alg-input" type="email" id="email" name="email" placeholder="Enter your account email..." required>
                    </div>

                    <div class="input-group">
                        <label class="alg-bold alg-text-primary-dark" for="password">Password</label>
                        <input class="alg-input" type="password" id="password" name="password" placeholder="Create a strong password..." required>
                    </div>

                    <div class="input-group">
                        <label class="alg-bold alg-text-primary-dark" for="retype-password">Retype Password</label>
                        <input class="alg-input" type="password" id="retype-password" name="retype-password" placeholder="Confirm the password..." required>
                    </div>

                    <a href="password-reset" class="forgot-password alg-text-dark-100">Forget your password?</a>
                    <button type="submit" class="alg-btn register-button alg-bg-primary-dark alg-text-light-100 alg-bold alg-rounded-large">Register</button>
                </form>
                <p>Already have an account? <a href="/login" class="alg-text-primary-dark">Sign in</a></p>
                <div class="divider alg-text-light-75">
                    <div class="line alg-bg-light-75"></div>
                    <span class="or">OR</span>
                    <div class="line alg-bg-light-75"></div>
                </div>
                <p>Request Admin Access: <a href="/request-admin-access" class="alg-text-primary-dark">Here</a></p>      
            </div>
        </div>
    </div>
    <div class="rp-s1-col-right col">
            <div class="img">
                <img class="main-img" src="../../resources/images/register/main.jpg" alt="Algowrite Registration Image">
                <div class="overlay"></div>
            </div>
            <div class="rp-s1-logo-container">
                <div class="circle"></div>
                <div class="logo alg-bold">Algowrite</div>
                <div class="tagline alg-text-h2">Unleashing the magic of technology...!</div>
            </div>
    </div>
</section>
