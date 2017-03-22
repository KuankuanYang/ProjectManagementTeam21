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
    function doCheck()
    {
        var email = document.getElementById("email")

        if (email.value == '') 
        {
            alert("Please enter youe email."); 
            return false;
        }

        var format = /([\w\-]+\@[\w\-]+\.[\w\-]+)/;
        if (! format.test(email.value) ) 
        {
            alert("PLease enter a valid email address."); 
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
                <h3>Edit my information</h3>

                <form action="inc/userSetting.php" method="post" id="userSetting" onsubmit= "return doCheck()">

                    <div>
                        <label for="email">Email</label>
                        <input class="span4" type="text" name="email" id="email" value="<?php echo $user['email']; ?>" size="22">
                    </div>

                    <div>
                        <label for="email">About</label>
                        <input class="span4" type="text" name="about" id="about" value="<?php echo $user['about']; ?>" size="22">
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