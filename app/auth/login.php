
      <div class="row no-gutters">
        <div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-top-3 space-lg-0">
           <!-- Form -->
           <form class="js-validate" method="post" id="loginForm">
             <!-- Title -->
             <div class="mb-4 mb-md-3">
               <h1 class="h2">Welcome back!</h1>
               <p>Login to manage your account.</p>
             </div>
             <!-- End Title -->
         		<div id="alert" class="mb-2"></div>
             <!-- Form Group -->
             <div class="form-group">
               <!-- <label class="input-label" for="signinSrEmail">Email address or Username</label> -->
               <input type="email" class="form-control form-control-sm" name="email" placeholder="Email address" aria-label="Email address" required />
             </div>
             <!-- End Form Group -->
             <!-- Form Group -->
             <div class="form-group">
               <label class="input-label" for="signinSrPassword" tabindex="0">
                 <span class="d-flex justify-content-between align-items-center">
                   &nbsp;
                   <a class="text-capitalize text-primary font-weight-normal" href="reset">Forgot Password?</a>
                 </span>
               </label>
               <div class="input-group mb-4">
                  <input type="password" id="signinSrPassword" class="form-control form-control-sm" name="password" placeholder="Password" aria-label="Password" required />
                  <div class="input-group-append hide-show"><span class="input-group-text "><i class="fas fa-eye-slash fa-sm"></i></span></div>
                </div>
             </div>
             <!-- End Form Group -->

             <!-- Button -->
             <div class="flex-1 mb-5">
               <div class="text-sm-right">
                 <button type="submit" name="loginBtn" class="btn btn-success btn-sm transition-3d-hover" style="background: #679436;">Sign in</button>
               </div>
               <div class="mb-3 mb-sm-0">
                 <span class="font-size-1 text-muted">Don't have an account?</span>
                 <a class="font-size-1 font-weight-bold text-primary" href="signup">Signup</a>
               </div>
             </div>
             <!-- End Button -->
             <div class="row mb-5 mt-2 space-top-1"></div>
           </form>
           <!-- End Form -->
        </div>
      </div>

