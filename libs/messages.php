<?php
    function showError($message){
        echo "<span class='status_message error'>$message</span>";
    }
    function showInfo($message){
        echo "<span class='status_message info'>$message</span>";
    }
    function showSuccess($message){
        echo "<span class='status_message success'>$message</span>";
    }
?>