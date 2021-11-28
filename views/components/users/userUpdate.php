<div>
    <div class="form-outline mb-4">
        <input type="text" id="user-fullname" class="form-control" name="fullname" value="<?= $user['fullname'] ?>" />
        <label class="form-label" for="loginName">Họ và tên</label>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" id="user-address" class="form-control" name="address" value="<?= $user['address'] ?>" />
        <label class="form-label" for="registerEmail">Địa chỉ</label>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="registerEmail" class="form-control" name="email" value="<?= $user['email'] ?>" />
        <label class="form-label" for="registerEmail">Email</label>
    </div>

    <div class="mb-4 row align-items-center">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" id="registerPhoneNumber" class="form-control" name="phoneNumber" value="<?= $user['phoneNumber'] ?>" />
                <label class="form-label" for="registerPhoneNumber">Số điện thoại</label>
            </div>
        </div>
        <div class="col-6">
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