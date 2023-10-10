<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
 <SCRIPT LANGUAGE='JavaScript'>
                                        window.alert('Successfully Logged Out. :)')
                                        window.location.href='index.php'
 </SCRIPT>

</body>
</html> 