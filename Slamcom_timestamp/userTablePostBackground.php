<?php
    $table = 'user';

    $primarykey = 'userID';
/*
    $columns = array(
        array( 'db' => 'userID', 'dt' => 'userID'),
        array( 'db' => 'firstname', 'dt' => 'firstname'),
        array( 'db' => 'lastname', 'dt' => 'lastname'),
        array( 'db' => 'emailadd', 'dt' => 'emailadd')
    );
    */
    $columns = array(
        0 => 'userID',
        1 => 'firstname',
        2 => 'lastname',
        3 => 'emailadd'
    );

    $json_data = array(
        "draw"              => intval($_REQUEST['draw']),
        "recordsTotal"      => intval($totaldata),
        "recordsFiltered"   => intval($totalfiltered),
        "data"              => $data
    );

    echo json_encode($json_data);
    /*
    $sql_details = array(
        'user' => 'root',
        'pass' => '',
        'db' => 'slamcom',
        'host' => 'localhost'
    )
    */

    //require('ssp.class.php');

    /*echo json_encode(
        SSP:simple($_POST, $sql_details, $table, $primarykey, $columns)
    );
    */
?>