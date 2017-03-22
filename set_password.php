<?php
session_start();
include "inc/connectDB.php";

if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];
        $userinfo=mysql_query("select * from user where username='$username'");
        $user=mysql_fetch_array($userinfo);
        $uid=$user['uid'];
        $name=$user['name'];
        $admin=$user['isAdmin'];
}

require("header.php");
?>

<script type="text/javascript">
function doCheck(){
	var p1   =   document.getElementById("oldpassword").value;
	var p2   = 	 document.getElementById("newpassword").value;
	var p3   =   document.getElementById("cnewpassword").value;

	if(p1 ==""){
	alert('Please enter the old password.');
	return false;
	}
	if(p2 ==""){
	alert('Please enter the new password.');
	return false;
	}
	if(p3 ==""){
	alert('Please confirm the new password.');
	return false;
	}
	if (p2 != p3) {
	alert('The confirmation is not match.'); 
	return false;
	}
}
</script>

<!-- Start of Page Container -->
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="respond">
                <h3>Change password</h3>

                <form action="inc/set_password.php" method="post" id="userSetting" onsubmit= "return doCheck()">

                    <div>
                        <label for="oldpassword">Old Password</label>
                        <input class="span4" type="password" name="oldpassword" id="oldpassword" value="" size="22">
                    </div>

                    <div>
                        <label for="newpassword">New Password</label>
                        <input class="span4" type="password" name="newpassword" id="newpassword" value="" size="22">
                    </div>

                    <div>
                        <label for="cnewpassword">Confirm New Password</label>
                        <input class="span4" type="password" name="cnewpassword" id="cnewpassword" value="" size="22">
                    </div>

                    <div>
                        <input class="btn" name="submit" type="submit" id="submit" value="Submit">
                    </div>

                </form>

            </div>
            </div>
        </div>
    </div>                                        
</div>
<!-- End of Page Container -->

<?php require("footer.php");?>