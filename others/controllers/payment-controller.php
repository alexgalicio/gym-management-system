<?php
session_start();
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $offerId = $_POST['offer_id'];
    $classId = $_POST['class_id'];

    $_SESSION['offer_id'] = $offerId;
    $_SESSION['class_id'] = $classId;

    $currDate = date('Y-m-d');
    $sql_transaction = "INSERT INTO transaction_history (user_id, amount, date)
    VALUES ('$userId', '$amount', '$currDate')";
    $con->query($sql_transaction);


    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.paymongo.com/v1/sources",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'data' => [
                'attributes' => [
                    'amount' => $amount * 100, // Amount in cents
                    'description' => $description,
                    'redirect' => [

                        'success' => "http://localhost/Gym-System/pages/member/actions/$url.php?user_id=$userId",
                        'failed' => "http://localhost/Gym-System/pages/member/payment-failed.php?user_id=$userId",
                    ],
                    'type' => 'gcash',
                    'currency' => 'PHP'

                ]
            ]
        ]),
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Basic c2tfdGVzdF9rQ3F2V016eExNNTVob3Q4NGlNY01nZWI6",
            "content-type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        $decoded = json_decode($response, true);

//debug
// echo "<pre>";
// print_r($decoded);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

        if (isset($decoded['data']['attributes']['redirect']['checkout_url'])) {
            $checkoutUrl = $decoded['data']['attributes']['redirect']['checkout_url'];

            echo "<script>window.location.href = '$checkoutUrl';</script>";
            exit();
        } else {
            echo "Failed to get checkout URL from response.";
        }
    }
} else {
    echo "Invalid request.";
}
