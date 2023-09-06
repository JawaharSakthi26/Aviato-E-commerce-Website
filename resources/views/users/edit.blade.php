@extends('layouts.app')
@section('content')
<title>Sumanas Tech | Edit Register User</title>
<body class="hold-transition bg-gray mb-5">
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="register-box">
                <div class="register-logo">
                    <a href="#"><b>SUMANAS</b>&nbsp;tech</a>
                </div>
                <div class="card">
                    <div class="card-body register-card-body rounded-circle">
                        <p class="login-box-msg">Register a new membership</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ url('users/' . $user->id) }}" method="post" id="registerFormEdit">
                            @csrf
                            @method("PATCH")
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name"
                                    value="{{ $user->name }}" required autocomplete="name" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $user->email }}" required autocomplete="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Re-type password"
                                    name="password_confirmation" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Contact" maxlength="10"
                                    name="contact" value="{{ $user->contact }}" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <textarea class="form-control" placeholder="Enter your address" name="address"
                                    required>{{ $user->address }}</textarea>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-address-card"></span>
                                    </div>
                                </div>
                            </div>
                            <?php $countryArr = ["1" => "India", "2" => "Canada", "3" => "USA"] ?>
                            <div class="input-group mb-3">
                                <select class="form-control" name="country" required>
                                    <?php foreach ($countryArr as $countryKey => $countryValue) { ?>
                                    <option value="<?php echo $countryKey ?>"
                                        <?php echo ($user->country == $countryKey) ? 'selected' : ''; ?>>
                                        <?php echo $countryValue ?></option>
                                    <?php } ?>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" placeholder="Enter your skills" name="skills"
                                    value="{{ $user->skills }}" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-tasks"></span>
                                    </div>
                                </div>
                            </div>
                            <?php $genderArr = ["1" => "Male", "2" => "Female", "3" => "Others"] ?>
                            <div class="form-group">
                                <label>Gender:</label>
                                <div class="gender-container d-flex justify-content-between">
                                    <?php foreach ($genderArr as $genderKey => $genderValue) { ?>
                                    <div class="icheck-primary">
                                        <input type="radio" name="gender" value="<?php echo $genderKey ?>"
                                            id="gender<?php echo $genderKey ?>"
                                            <?php echo ($user->gender == $genderKey) ? 'checked' : ''; ?>>
                                        <label for="gender<?php echo $genderKey ?>"><?php echo $genderValue ?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $hobbyArr = ["1" => "Cricket", "2" => "Football", "3" => "Badminton"];
                            $hobbies  = explode(',', $user->hobbies); ?>
                            <div class="form-group">
                                <label>Hobbies:</label>
                                <div class="hobby-container d-flex justify-content-between">
                                    <?php foreach ($hobbyArr as $hobbyKey => $hobbyValue) { ?>
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="hobbies[]"
                                            value="<?php echo $hobbyKey ?>" id="hobby<?php echo $hobbyKey ?>"
                                            <?php echo in_array($hobbyKey, $hobbies) ? 'checked' : '' ?>>
                                        <label for="hobby<?php echo $hobbyKey ?>"><?php echo $hobbyValue ?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="error-msg"></div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
</body>
@endsection
