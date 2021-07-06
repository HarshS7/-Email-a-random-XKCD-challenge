<?php

namespace app;

require_once dirname(__FILE__) . '/user.php';
require_once dirname(__FILE__) . '/validateForm.php';

if (isset($_GET['activecode'])) {

        //*Senitize the data
        $senitize=new validateForm();
        $code=$senitize->test_input($_GET['activecode']);

        //* Decode the data
        $code=base64_decode($code);
    
        

        $user = new user();
        if ($user->updatedata($code)) {
                echo "<h3>Your account is verified, you will start receiving our emails soon!</h3>
                <p><b>Note:</b>As we are sending emails in a batch, it may take up to 5-6 minutes to receive the first email please be patient. Thank you for joining us.</p>";
        } else {
                echo "something went wrong";
        }
}
