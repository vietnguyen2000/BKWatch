<div>
    <label class="disabled" for="user-fullname">Họ và tên :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-fullname" value="<?php echo $user['fullname'] ?>" disabled>
    </div>

    <label class="disabled" for="user-gender">Giới tính :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-gender" value="<?php echo $user['gender']? "Nam" : "Nữ" ?>" disabled>
    </div>

    <label class="disabled" for="user-address">Địa chỉ :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-address" value="<?php echo $user['address'] ?>" disabled>
    </div>

    <label class="disabled" for="user-email">Email :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-email" value="<?php echo $user['email'] ?>" disabled>
    </div>

    <label class="disabled" for="user-phone">Số điện thoại :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-phone" value="<?php echo $user['phoneNumber'] ?>" disabled>
    </div>
</div>