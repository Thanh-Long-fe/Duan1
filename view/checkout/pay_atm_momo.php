<?php
session_start();
header('Content-type: text/html; charset=utf-8');
$_SESSION['order']['id'] = $_POST['id_don_hang'];
$_SESSION['order']['ho_ten'] = $_POST['ho_ten'];
$_SESSION['order']['dia_chi'] = $_POST['dia_chi'];
$_SESSION['order']['sdt'] = $_POST['sdt'];
$_SESSION['order']['email'] = $_POST['email'];
$_SESSION['order']['sp_bt'] = $_POST['sp_bt'];
$_SESSION['order']['gia'] = $_POST['gia'];
$_SESSION['order']['payment_method'] = $_POST['payment_method'];

if(isset($_POST['ghi_chu'])){
    $_SESSION['order']['ghi_chu'] = $_POST['ghi_chu'];
}
else{
    $_SESSION['order']['ghi_chu'] = '';
}
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$tien = $_POST['monney'];
$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = "$tien";
$orderId = $_POST['id_hoa_don'];
$redirectUrl = "http://localhost/duan1/view/index.php?act=thanks";
$ipnUrl = "http://localhost/duan1/view/index.php?act=thanks";
$extraData = "";



    $requestId = time() . "";
    $requestType = "payWithATM";

    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);

?>