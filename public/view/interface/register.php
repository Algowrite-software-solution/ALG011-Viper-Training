<section id="register">
    <div class="col col-left alg-bg-light-100">
        <div class="main-left">
            <h1 class="alg-bold-medium">Register</h1>
            <div class="sub-left">
                <form action="/register" method="post">
                    <div class="input-group">
                        <label class="alg-bold alg-text-primary-dark"for="email">Email address</label>
                        <input class="alg-border-primary-dark alg-text-light-50" type="email" id="email" name="email" placeholder="Enter your account email..." required>
                    </div>

                    <div class="input-group">
                        <label class="alg-bold alg-text-primary-dark"for="password">Password</label>
                        <input class="alg-border-primary-dark alg-text-light-50" type="password" id="password" name="password" placeholder="Create a strong password..." required>
                    </div>

                    <div class="input-group">
                        <label class="alg-bold alg-text-primary-dark"for="retype-password">Retype Password</label>
                        <input class="alg-border-primary-dark alg-text-light-50" type="password" id="retype-password" name="retype-password" placeholder="Confirm the password..." required>
                    </div>

                    <a href="#" class="forgot-password alg-text-dark-100">Forget your password?</a>
                    <button type="submit" class="register-button alg-bg-primary-dark alg-text-light-100 alg-bold alg-rounded-large">Register</button>
                </form>
                <p>Already have an account? <a href="/login" class="login-link alg-text-primary-dark">Sign in</a></p>
                <div class="divider alg-text-light-75">
                    <div class="line alg-bg-light-75"></div>
                    <span class="or">OR</span>
                    <div class="line alg-bg-light-75"></div>
                </div>
                <p>Request Admin Access: <a href="/request-admin-access" class="admin-access-link alg-text-primary-dark">Here</a></p>      
            </div>
        </div>
    </div>
    <div class="col col-right">
            <div class="img">
                <img class="main-img" src="../../resources/images/register/main.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="logo-container">
                <div class="circle"></div>
                <div class="logo alg-bold">Algowrite</div>
                <div class="tagline alg-text-h2">Unleashing the magic of technology...!!</div>
            </div>
    </div>
</section>