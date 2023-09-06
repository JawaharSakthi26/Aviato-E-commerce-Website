@extends('layouts.first')
@section('content')
<title>Sumanas Tech | Register User</title>
<body class="hold-transition bg-gray mb-5">
<div class="container d-flex justify-content-center mt-5">
  <div class="register-box w-50">
    <div class="register-logo">
      <a href="#"><b>SUMANAS</b>&nbsp;tech</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body rounded-circle">
        <p class="login-box-msg">Register a new membership</p>

        <form action="/store" method="post" id="registerForm">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Re-type password" name="password_confirmation" required autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Contact" maxlength="10" name="contact" value="{{ old('contact') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <textarea class="form-control" placeholder="Enter your address" name="address" required>{{ old('address') }}</textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <select class="form-control" name="country" required>
              <option value="" disabled selected>Select your country</option>
              <option value="1">INDIA</option>
              <option value="2">Canada</option>
              <option value="3">USA</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-globe"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-4">
            <input type="text" class="form-control" placeholder="Enter your skills" name="skills" value="{{ old('skills') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-tasks"></span>
                    </div>
                </div>
            </div>

          <div class="form-group">
            <label>Gender:</label>
            <div class="gender-container d-flex justify-content-between">
              <div class="icheck-primary">
                <input type="radio" name="gender" value="1" id="genderMale">
                <label for="genderMale">Male</label>
              </div>  
              <div class="icheck-primary">
                <input type="radio" name="gender" value="2" id="genderFemale">
                <label for="genderFemale">Female</label>
              </div>
              <div class="icheck-primary">
                <input type="radio" name="gender" value="3" id="genderOthers">
                <label for="genderOthers">Others</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Hobbies:</label>
            <div class="hobby-container d-flex justify-content-between">
              <div class="icheck-primary">
                <input type="checkbox" name="hobbies[]" value="1" id="hobbyReading">
                <label for="hobbyReading">Cricket</label>
              </div>
              <div class="icheck-primary">
                <input type="checkbox" name="hobbies[]" value="2" id="hobbyMusic">
                <label for="hobbyMusic">Football</label>
              </div>
              <div class="icheck-primary">
                <input type="checkbox" name="hobbies[]" value="3" id="hobbySports">
                <label for="hobbySports">Badminton</label>
              </div>
            </div>
          </div>
          <div class="error-msg"></div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
            </div>
          </div>
        </form>
        <a href="/login" class="text-center mb-4">I already have a membership</a>
      </div>  
    </div>
  </div>
</div>
</body>
@endsection
