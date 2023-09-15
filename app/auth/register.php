        <div class="row no-gutters">
          <div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-top-3 space-lg-0">
            <!-- Form -->
            <form class="" id="signupForm" method="post" autocomplete="on">
              <!-- Title -->
              <div class="mb-2 mb-md-2">
                <h1 class="h2">Welcome to NGCorpers</h1>
                <p>Create new account it's free and quick.</p>
              </div>
              <!-- End Title -->
              <div id="alert" class="mb-4"></div>
              <div class="row">
                <div class="col-lg-12 mb-2">
                  <!-- <label class="input-label" for="signinSrName">Fullname</label> -->
                  <input type="text" class="form-control form-control-sm" name="fullname" id="signinSrName" placeholder="Enter your fullname (Surname first)" aria-label="Fullname" required
                         data-msg="Please enter your fullname">
                </div>
                <div class="col-lg-6 mb-2">
                  <!-- <label class="input-label" for="signinSrEmail">Email address</label> -->
                  <input type="email" class="form-control form-control-sm" name="email" id="signinSrEmail" placeholder="Email address" aria-label="Email address" required
                         data-msg="Please enter a valid email address.">
                </div>
                <div class="col-lg-6 mb-2">
                  <!-- <label class="input-label" for="signinSrGender">Gender</label> -->
                  <select class="form-control form-control-sm" name="gender" id="signinSrGender" placeholder="Gender" aria-label="Gender" required 
                  data-msg="Choose your gender.">
                    <option value="" selected hidden disabled>Choose gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <!-- <option value="none">Not Specified</option> -->
                  </select>
                </div>
                <div class="col-lg-12 mb-2">
                  <div class="input-group">
                    <input type="password" class="form-control form-control-sm" name="password" id="signinSrPassword" placeholder="New password" aria-label="********" required
                        data-msg="Enter your password at least 8 characters long (Including letters and numbers)">
                    <div class="input-group-append hide-show"><span class="input-group-text "><i class="fas fa-eye-slash fa-sm"></i></span></div>
                  </div>
                </div>
              </div>
              <!-- Checkbox -->
              <div class="mb-2">
                <small>
                  <span>By Logging in, signing up or continuing, I agree to
                    NGCorpers <a href="terms" class="">Terms of Use</a> and <a href="privacy" class="">Privacy Policy.</a></span>
                </small>
              </div>
              <!-- End Checkbox -->
              <!-- Button -->
              <div class="row align-items-center mb-5">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <span class="font-size-1 text-muted">Already have an account?</span>
                  <a class="font-size-1 font-weight-bold text-primary" href="login">Login</a>
                </div>
                <div class="col-sm-6 text-sm-right">
                  <button type="submit" name="register" class="btn btn-success btn-sm transition-3d-hover" style="background: #679436;">Sign Up</button>
                </div>
              </div>
              <!-- End Button -->
              <div class="row mb-5 mt-2 space-top-1"></div>
            </form>
            <!-- End Form -->
          </div>
        </div>
