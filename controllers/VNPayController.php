<?php

namespace Controllers;

use DateTime;
use Exception;
use Models\CartItemModel;
use Models\OrdersModel;

if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}


class VNPayController extends BaseController
{
  public function payment($url)
  {
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $shipFee = intval($_POST['shipFee']);

    $userId = $_SESSION['user']['id'];
    $cartItemModel = new CartItemModel();
    $listCartItems = $cartItemModel->getByCondition(['userId' => $userId]);

    $prices = 0;
    for ($i = 0; $i < count($listCartItems); $i++) {
      $price = $listCartItems[$i]['price'];
      $discount = $listCartItems[$i]['discount'];
      $prices += $price * (100 - $discount) / 100;
    };

    $total = $prices + $shipFee;

    $orderModel = new OrdersModel();
    $orderId = $orderModel->insert([
      "userId" => $userId,
      "address" => $address,
      "phoneNumber" => $phoneNumber,
      "total" => $total,
      "paymentMethod" => "VNPay",
      "shippingFee" => $shipFee,
      "shippingProvider" => "default",
      "status" => 0
    ]);

    $totalFormat = currency_format($total, 'VND');

    global $vnp_TmnCode;
    global $vnp_Url;
    global $vnp_HashSecret;
    global $vnp_ReturnUrl;

    print_r([
      "orderId" => $orderId,
      "tmvCode" => $vnp_TmnCode,
      "vnp_url" => $vnp_Url,
      "hashsecret" => $vnp_HashSecret,
      "vnp_ReturnUrl" => $vnp_ReturnUrl,
      "totalFormat" => $totalFormat

    ]);

    $this->VNPayPayment([
      'order_id' => $orderId,
      'order_desc' => "Thanh toan don hang $orderId. So tien $totalFormat",
      'order_type' => 2,
      'amount' => 10000
    ]);
  }

  public function VNPayPayment($config)
  {
    global $vnp_TmnCode;
    global $vnp_Url;
    global $vnp_HashSecret;
    global $vnp_ReturnUrl;
    global $vnp_IpnUrl;
    if (!isset($vnp_TmnCode) || !isset($vnp_Url)  || !isset($vnp_HashSecret) || !isset($vnp_ReturnUrl) || !isset($vnp_IpnUrl)) {
      $this->showError('503', 'Ứng dụng hiện chưa hỗ trợ thanh toán!', 'Nếu bạn là admin của ứng dụng, xin hãy kiểm tra lại config của server để có thể mở hỗ trợ thanh toán!');
      return;
    }

    $vnp_TxnRef = $config['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = $config['order_desc'];
    $vnp_OrderType = $config['order_type'];
    $vnp_Amount = $config['amount'] * 100;
    $vnp_BankCode = $config['bank_code'];
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    $vnp_ExpireDate = $config['txtexpire'];
    //Billing
    $vnp_Bill_Mobile = $config['txt_billing_mobile'];
    $vnp_Bill_Email = $config['txt_billing_email'];
    $fullName = trim($config['txt_billing_fullname']);
    if (isset($fullName) && trim($fullName) != '') {
      $name = explode(' ', $fullName);
      $vnp_Bill_FirstName = array_shift($name);
      $vnp_Bill_LastName = array_pop($name);
    }
    $vnp_Bill_Address = $config['txt_inv_addr1'];
    $vnp_Bill_City = $config['txt_bill_city'];
    $vnp_Bill_Country = $config['txt_bill_country'];
    $vnp_Bill_State = $config['txt_bill_state'];
    // Invoice
    $vnp_Inv_Phone = $config['txt_inv_mobile'];
    $vnp_Inv_Email = $config['txt_inv_email'];
    $vnp_Inv_Customer = $config['txt_inv_customer'];
    $vnp_Inv_Address = $config['txt_inv_addr1'];
    $vnp_Inv_Company = $config['txt_inv_company'];
    $vnp_Inv_Taxcode = $config['txt_inv_taxcode'];
    $vnp_Inv_Type = $config['cbo_inv_type'];
    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => 'vn',
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_ReturnUrl,
      "vnp_TxnRef" => $vnp_TxnRef,
      "vnp_ExpireDate" => $vnp_ExpireDate,
      "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
      "vnp_Bill_Email" => $vnp_Bill_Email,
      "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
      "vnp_Bill_LastName" => $vnp_Bill_LastName,
      "vnp_Bill_Address" => $vnp_Bill_Address,
      "vnp_Bill_City" => $vnp_Bill_City,
      "vnp_Bill_Country" => $vnp_Bill_Country,
      "vnp_Inv_Phone" => $vnp_Inv_Phone,
      "vnp_Inv_Email" => $vnp_Inv_Email,
      "vnp_Inv_Customer" => $vnp_Inv_Customer,
      "vnp_Inv_Address" => $vnp_Inv_Address,
      "vnp_Inv_Company" => $vnp_Inv_Company,
      "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
      "vnp_Inv_Type" => $vnp_Inv_Type,
      "vnp_IpnUrl" => $vnp_IpnUrl
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if (!isset($value)) continue;
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url_redirect = $vnp_Url . "?" . $query;

    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
    $vnp_Url_redirect .= 'vnp_SecureHash=' . $vnpSecureHash;

    $returnData = array(
      'code' => '00', 'message' => 'success', 'data' => $vnp_Url_redirect
    );

    $this->redirect($vnp_Url_redirect);
  }

  public function VNPayIPN($url)
  {
    global $vnp_HashSecret;
    $inputData = array();
    $returnData = array();

    foreach ($_GET as $key => $value) {
      if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
      }
    }

    $vnp_SecureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
    $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
    $vnp_Amount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi

    $Status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo URL thanh toán.
    $orderId = $inputData['vnp_TxnRef'];

    try {
      //Check Orderid    
      //Kiểm tra checksum của dữ liệu
      if ($secureHash == $vnp_SecureHash) {
        //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId            
        //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
        //Giả sử: $order = mysqli_fetch_assoc($result);   

        $order = NULL;
        if ($order != NULL) {
          if ($order["Amount"] == $vnp_Amount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
          {
            if ($order["Status"] != NULL && $order["Status"] == 0) {
              if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                $Status = 1; // Trạng thái thanh toán thành công
              } else {
                $Status = 2; // Trạng thái thanh toán thất bại / lỗi
              }
              //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
              //
              //
              //
              //Trả kết quả về cho VNPAY: Website/APP TMĐT ghi nhận yêu cầu thành công                
              $returnData['RspCode'] = '00';
              $returnData['Message'] = 'Confirm Success';
            } else {
              $returnData['RspCode'] = '02';
              $returnData['Message'] = 'Order already confirmed';
            }
          } else {
            $returnData['RspCode'] = '04';
            $returnData['Message'] = 'invalid amount';
          }
        } else {
          $returnData['RspCode'] = '01';
          $returnData['Message'] = 'Order not found';
        }
      } else {
        $returnData['RspCode'] = '97';
        $returnData['Message'] = 'Invalid signature';
      }
    } catch (Exception $e) {
      $returnData['RspCode'] = '99';
      $returnData['Message'] = 'Unknow error';
    }
    //Trả lại VNPAY theo định dạng JSON
    echo json_encode($returnData);
  }

  public function VNPayReturn($url)
  {
    global $vnp_HashSecret;
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
      if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
      }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    if ($secureHash == $vnp_SecureHash) {
      if ($_GET['vnp_ResponseCode'] == '00') {
        $ordersModel = new OrdersModel();
        $ordersModel->updateById($_GET['vnp_TxnRef'], [
          "status" => 1,
          "bankTranNo" => strval($_GET['vnp_BankTranNo']),
          "transactionNo" => strval($_GET['vnp_TransactionNo']),
          "payDate" => DateTime::createFromFormat('YmdHis', strval($_GET['vnp_PayDate']))->format('Y-m-d H:i:s')
        ]);
      } else {
        $_reason = 'Không rõ';
        $_resCode = $_GET['vnp_ResponseCode'];
        if ($_resCode == '01') {
          $_reason = 'Không tìm thấy mã order';
        } else if ($_resCode == '02') {
          $_reason = 'Đơn hàng đã được xác nhận';
        } else if ($_resCode == '04') {
          $_reason = 'Số tiền thanh toán không chính xác';
        } else if ($_resCode == '97') {
          $_reason = 'Chữ ký không chính xác';
        }
        $this->showError('500', 'Lỗi thanh toán', 'Thanh toán không thành công với lý do: ' . $_reason);
      }
    } else {
      $this->showError('500', 'Lỗi thanh toán', 'Chữ ký thanh toán không hợp lệ!');
    }
  }
}
