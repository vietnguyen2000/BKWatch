<div class="card my-5 mx-auto col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 col-xxl-2">
  <div class="card-body">
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Đăng nhập</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Đăng ký</a>
      </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form method="post" action="/login" class="row needs-validation" novalidate>
          <div class="col-12" style="margin-bottom:20px;">
            <div class="form-outline">
              <input type="text" id="loginName" class="form-control" name="username" required minlength="5" maxlength="32" />
              <label class="form-label" for="loginName">Tên đăng nhập</label>
              <div class="invalid-feedback">Nhập tài khoản (từ 5 đến 32 ký tự).</div>
            </div>
          </div>

          <!-- Password input -->
          <div class="col-12" style="margin-bottom:20px;">
            <div class="form-outline">
              <input type="password" id="loginPassword" class="form-control" name="password" required minlength="5" maxlength="32" />
              <label class="form-label" for="loginPassword">Mật khẩu</label>
              <div class="invalid-feedback">Nhập mật khẩu (từ 5 đến 32 ký tự).</div>
            </div>
          </div>

          <!-- 2 column grid layout -->
          <div class="col-12" style="margin-bottom:20px;">
            <!-- <div class="row">
              <div class="col-md-6 d-flex justify-content-center"> -->
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" value="1" id="loginCheck" checked name="rememberMe" readonly />
              <label class="form-check-label" for="loginCheck"> Tự động đăng nhập </label>
            </div>
            <!-- </div> -->
            <!-- </div> -->

            <!-- <div class="col-md-6 d-flex justify-content-center">
              <a href="#!">Quên mật khẩu?</a>
            </div> -->
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Đăng nhập</button>

        </form>
      </div>
      <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="post" action="/register">
          <!-- Name input -->
          <div class="form-outline mb-4">
            <input type="text" id="registerName" class="form-control" name="fullname" />
            <label class="form-label" for="registerName">Họ và tên</label>
          </div>

          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="registerUsername" class="form-control" name="username" />
            <label class="form-label" for="registerUsername">Tên đăng nhập</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="registerEmail" class="form-control" name="email" />
            <label class="form-label" for="registerEmail">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="registerPassword" class="form-control" name="password" />
            <label class="form-label" for="registerPassword">Mật khẩu</label>
          </div>

          <div class="mb-4 row align-items-center">
            <div class="col-6">
              <div class="form-outline">
                <input type="text" id="registerPhoneNumber" class="form-control" name="phoneNumber" />
                <label class="form-label" for="registerPhoneNumber">Số điện thoại</label>
              </div>
            </div>
            <div class="col-6">
              <div class="row justify-content-center">
                <div class="w-auto">
                  <input class="form-check-input" type="radio" name="gender" value="1" id="registerGenderMale" checked />
                  <label class="form-check-label" for="registerGenderMale"> Nam </label>
                </div>

                <!-- Default checked radio -->
                <div class="w-auto">
                  <input class="form-check-input" type="radio" name="gender" value="0" id="registerGenderFemale" />
                  <label class="form-check-label" for="registerGenderFemale"> Nữ </label>
                </div>
              </div>

            </div>
          </div>

          <!-- Checkbox -->
          <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
            <label class="form-check-label" for="registerCheck">
              Tôi đã đọc và đồng ý với điều khoản sử dụng
            </label>
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-3">Đăng ký</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach((form) => {
      form.addEventListener('submit', (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>