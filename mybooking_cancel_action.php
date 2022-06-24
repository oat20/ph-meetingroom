<?php
require_once './bookingroom/config.php';
require_once './bookingroom/mysqli_connect.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){

    mysqli_autocommit($mysqli, FALSE);

    $uq_id = mysqli_real_escape_string($mysqli, $_POST['uq_id']);
    $rs = mysqli_query($mysqli, "update meetingroom_userq set
        uq_cancel = 'Yes',
        uq_cancel_date = CURRENT_TIMESTAMP()
        where uq_id = '$uq_id'
    ");

    if(mysqli_commit($mysqli)){
        //line notify
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_POST, 1);
        // In real life you should use something like:
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
                    array(
                        'message' => strtoupper($_SERVER['HTTP_HOST']).' Update Transaction @'.date('d/m/Y H:i:s').' '.$livesite.'bookingroom/inc/roomview.inc.php?keyID='.$uq_id
                    )
                )
            );

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded",
			"Authorization: Bearer BT3b9bLnTnRLQ51PrWezMYcwFl4BXL6D34m6AsaIULS"
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $server_output = curl_exec($ch);

        curl_close ($ch);
        //line notify

        header('location: ./mybooking.php');
    }else{
        exit();
    }

}else{
    exit();
}

mysqli_rollback($mysqli);
mysqli_close($mysqli);
?>