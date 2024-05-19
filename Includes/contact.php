<?php

    include "functions.php";
	
	if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_subject']) && isset($_POST['contact_message']))
	{
		
		$contact_name = test_input($_POST['contact_name']);
        $contact_email  = test_input($_POST['contact_email']);
        $contact_subject = test_input($_POST['contact_subject']);
        $contact_message = test_input($_POST['contact_message']);        

        try
        {
            mail("jaliilaziiz@gmail.com",$contact_subject,$contact_message);
            echo "<div class='alert alert-success'>";
                echo " لقد تم ارسال رسالتك.";
            echo "</div>";
        }
        catch(Exception $e)
        {
            echo "<div class='alert alert-warning'>";
                echo " وقع مشكل أثناء ارسال الرسالة, المرجو اعادة المحاولة!";
            echo "</div>";
        }

	}

?>