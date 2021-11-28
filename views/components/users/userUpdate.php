<div class="row">

  <div class="col-12" style="margin-bottom:20px;">
    <div class="form-outline">
      <input type="text" id="user-fullname" class="form-control" name="fullname" value="<?= $user['fullname'] ?>" required minlength="2" />
      <label class="form-label" for="user-fullname">Họ và tên</label>
      <div class="invalid-feedback">Nhập họ và tên.</div>
    </div>
  </div>

  <!-- Email input -->
  <div class="col-12" style="margin-bottom:20px;">
    <div class="form-outline">
      <input type="text" id="user-address" class="form-control" name="address" value="<?= $user['address'] ?>" required minlength="2" />
      <label class="form-label" for="user-address">Địa chỉ</label>
      <div class="invalid-feedback">Nhập địa chỉ.</div>
    </div>
  </div>

  <!-- Email input -->
  <div class="col-12" style="margin-bottom:20px;">
    <div class="form-outline">
      <input type="email" id="registerEmail" class="form-control" name="email" value="<?= $user['email'] ?>" required />
      <label class="form-label" for="registerEmail">Email</label>
      <div class="invalid-feedback">Nhập email đúng định dạng.</div>
    </div>
  </div>

  <div class="col-12" style="margin-bottom:20px;">
    <div class="row align-items-center">
      <div class="col-12 col-sm-6">
        <div class="form-outline">
          <input type="text" id="registerPhoneNumber" class="form-control" name="phoneNumber" value="<?= $user['phoneNumber'] ?>" required minlength="9" maxlength="12" />
          <label class="form-label" for="registerPhoneNumber">Số điện thoại</label>
          <div class="invalid-feedback">Nhập số điện thoại.</div>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <div class="row justify-content-center">
          <div class="w-auto">
            <input class="form-check-input" type="radio" name="gender" value="1" id="registerGenderMale" <?= $user['gender'] == '1' ? 'checked' : '' ?> />
            <label class="form-check-label" for="registerGenderMale"> Nam </label>
          </div>

          <!-- Default checked radio -->
          <div class="w-auto">
            <input class="form-check-input" type="radio" name="gender" value="0" id="registerGenderFemale" <?= $user['gender'] == '0' ? 'checked' : '' ?> />
            <label class="form-check-label" for="registerGenderFemale"> Nữ </label>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>