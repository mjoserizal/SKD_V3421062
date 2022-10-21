
<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

?> <script>
alert("Logout success")
window.location="../login.php"
</script> <?php

exit;

?>