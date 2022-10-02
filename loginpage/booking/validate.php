<?php
session_start();
if (isset($_GET['ticket'])) {

    require("../dbengine/dbconnect.php");
    $order_ref = $_GET['ticket'];

    if (empty($order_ref)) {
        $order_ref = $_SESSION['ORDERREF'];
    };
    $data = mysqli_query($conn, "SELECT * FROM booking_details WHERE order_ref='$order_ref'");
    if (($data) && (mysqli_num_rows($data) > 0)) { ?>
        <html>
        <style>
            .ticketbox {

                border: 2px dashed grey;
                font-family: tahoma;
                font-size: 14px;
                display: inline-block;
                width: 330px;
                height: auto;
                border-radius: 7px;
                padding: 21px;
                color: grey;

            }

            .ref {
                font-family: inherit;
                font-weight: bold;
                color: green;
            }
        </style>

        <body onload="window.print();">
    <?php


        //generating fields
        $row = mysqli_fetch_assoc($data);
        $fullname = $row['fullname'];
        $destination = $row['destination'];
        $traveldate = $row['date_reserved'];
        $travelclass = $row['class_reserved'];
        $seats = $row['seats_reserved'];
        $all = $seats;
        $amount = $row['amount'];
        $paymethod = $row['account'];
        $code = $row['transaction_id'];
        mysqli_close($conn);
        while ($seats > 0) {
            echo ("<div class='ticketbox'>");
            echo ("<a> ORDER REF:</a> <span class='ref'>$order_ref</span>");
            echo ("<ul><li>TICKET OWNER: " . $fullname . "</li>
<li>STADIUM: " . $destination . "</li>
<li>DATE OF MATCH: " . $traveldate . "</li>
<li>SEAT ROW: " . $travelclass . "</li>
<li>SEAT ID: " . $seats . " of " . $all . "</li>
<li>AMOUNT PAYING: " . $amount . " Via " . $paymethod . " Account Number: " . $code . "</li>
</ul>");
            echo ("</div>");
            $seats--;
        }
        echo ("</body></html>");
    }
}

    ?>