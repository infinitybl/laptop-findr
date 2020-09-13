<?php
$config=array(
'DB_HOST'=>'localhost',
'DB_USERNAME'=>'root',  //change to your username (keep if you are running off local machine using XAMPP)
'DB_PASSWORD'=>'', //change back to your password
'DB_DATABASE'=>'patel1ik_practice1'  //change to your database name
);

function repopulate ( $field ) {
    if ( isset( $_POST[$field] ) ) {
        echo htmlspecialchars( $_POST[$field] );
    }
}
?>
