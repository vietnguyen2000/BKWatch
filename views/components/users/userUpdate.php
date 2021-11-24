<div>
	<label class="" for="user-fullname">Họ và tên :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-fullname" name="fullname" value="<?php echo $user['fullname'] ?>">
    </div>

	<label for="user-gender">Giới tính :</label>
	<div class="input-group mb-3">                        				
		<select class="form-select" id="user-gender" name="gender">
			<option value="1" <?php echo $user['gender']? "selected" : "" ?>>Nam</option>
			<option value="0" <?php echo !$user['gender']? "selected" : "" ?>>Nữ</option>					
		</select>
	</div>

    <label class="" for="user-address">Địa chỉ :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-address" name="address" value="<?php echo $user['address'] ?>">
    </div>

    <label class="" for="user-email">Email :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-email" name="email" value="<?php echo $user['email'] ?>">
    </div>

    <label class="" for="user-phone">Số điện thoại :</label>
    <div class="input-group mb-3">                        
        <input type="text" class="form-control" id="user-phone" name="phoneNumber" value="<?php echo $user['phoneNumber'] ?>">
    </div>
</div>