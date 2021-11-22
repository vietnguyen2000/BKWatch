<div class="wrapThanhtoan">
  <h2 class="cart">Thanh Toán</h2>
  <div class="wrapinfo">
    <div class="basicInfo boderInfo">
      <h3 class="commonInfo">1.Thông tin cơ bản</h3>
        <div class="form-group">
          <label for="first_name" class="label-input">Họ và Tên</label>
          <input type="text" id="first_name" name="first_name">
        </div>
        <div class="form-group">
          <label for="address" class="label-input">Số điện thoại</label>
          <input type="text" id="address" name="address">
        </div>
    </div>
    <div class="transportInfo ">
      <h3 class="commonInfo">2.Vận chuyển</h3>
      <div class="form-group">
        <label for="address" class="label-input">Địa chỉ</label>
        <input type="text" id="address" name="address">
      </div>
      <div class="form-group">
          <label for="vanChuyen" class="label-input">Nhà vận chuyển</label>
          <select name="vanChuyen" id="vanChuyen">
              <option value="VietNam">Giao hàng nhanh</option>
              <option value="Australia">Giao hàng tiết kiệm</option>
              <option value="United States">VN Post</option>
              <option value="India">Ninja Van</option>
          </select>
      </div>
    </div>
    <div class="transferInfo boderInfo">
    <h3 class="commonInfo">3.Thanh toán</h3>
    <img src="https://store-cdn.arduino.cc/uni/wysiwyg/Payment_Options.jpg" alt="" class="paymendImg">
    <fieldset class="form-group field-set">
        <legend>Phương thức thanh toán</legend>
        <label class="r-label"><input type="radio" name="payment" value="momo">Momo</label>
        <label class="r-label"><input type="radio" name="payment" value="bank">Chuyển khoản ngân hàng</label>
        <label class="r-label"><input type="radio" name="payment" value="cash">Tiền mặt khi nhận hàng</label>
    </fieldset>
    </div>
    <form action="/action_page.php" style="margin-top: 15px;">
    <input type="checkbox" id="sub" name="sub" value="sub">
    <label for="sub"> Đăng kí để nhận thư mới từ BKWatch</label><br>
    </form>
    Bạn sẽ luôn nhận thư mới mỗi phút từ BKWatch, đảm bảo bạn sẽ luôn luôn
    nhớ tới việc mua đồng hồ nhé.
  </div>
  <div class="wrapGioHang">
    <div class="listgiohang">
      <ul class="giohang">
        <li>
          <div class="eachSanpham">
            <div class="sanPham">
              <div class="imaBox">
                <img src="https://m.media-amazon.com/images/I/81nC4u9eYfL._UY445_.jpg" alt="rolex">
              </div>
              <div class="infoBox">
                <div class="nameItem">Rolex dỏm</div>
                <div class="colorItem">Siver</div>
                <div class="alignleft colorItem">28mm</div>
                <div class="alignright colorItem">999,999,999 VND</div>
              </div>
            </div>
            <div class="special">
              <label class="container">Gói hàng đặt biệt
                <input type="checkbox" checked="checked">
                <!-- <span class="checkmark"></span> -->
              </label>
            </div>
          </div>
        </li>
        <li>
          <div class="eachSanpham">
            <div class="sanPham">
              <div class="imaBox">
                <img src="https://m.media-amazon.com/images/I/81nC4u9eYfL._UY445_.jpg" alt="rolex">
              </div>
              <div class="infoBox">
                <div class="nameItem">Rolex dỏm</div>
                <div class="colorItem">Siver</div>
                <div class="alignleft colorItem">28mm</div>
                <div class="alignright colorItem">999,999,999 VND</div>
              </div>
            </div>
            <div class="special">
              <label class="container">Gói hàng đặt biệt
                <input type="checkbox" checked="checked">
                <!-- <span class="checkmark"></span> -->
              </label>
            </div>
          </div>
        </li>
      </ul>
      <div class="infothem">
        <!-- <div class="alignleft colorItem">Tổng cộng</div>
        <div class="alignright colorItem">1999,999,999 VND</div> -->
      </div>
      <div class="total">
        
        <button type="button" id="reset" class="cal-btn">Mua hàng</button>
      </div>
    </div>

    <div class="khuyenMai">

    </div>
  </div>
</div>

