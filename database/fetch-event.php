<?php
    require_once "database_connection.php";

    $json = array();
    $sqlQuery = "SELECT B.B_START_DATETIME, B.B_END_DATETIME, R.R_NAME FROM BOOKING AS B LEFT JOIN ROOMS AS R ON B.B_ROOM_ID = R.R_ID WHERE B.IS_ACTIVE >= '1' AND R.IS_ACTIVE >= '1'";

    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($conn);
    echo json_encode($eventArray);
?>