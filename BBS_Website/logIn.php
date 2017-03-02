<?php require("header.php");?>

<script type="text/javascript">
    function doCheck()
    {
        var username = document.getElementById("username")
        var password = document.getElementById("password");

        if(username.value=="")
        {
            alert("Please enter you username.");
            return false;
        }

        if(password.value=="")
        {
            alert("Please enter your password.");
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
                <h3>Log In</h3>

                <form action="inc/log.php" method="post" id="logIn" onsubmit= "return doCheck()">

                    <div>
                        <label for="username">Username</label>
                        <input class="span4" type="text" name="username" id="username" value="" size="22">
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input class="span4" type="password" name="password" id="password" value="" size="22">
                    </div>
                   
                    <div>
                        <input class="btn" name="submit" type="submit" id="submit" value="Log In">
                    </div>

                </form>

            </div>
            </div>
        </div>
    </div>                                        
</div>
<!-- End of Page Container -->

<?php require("footer.php");?>