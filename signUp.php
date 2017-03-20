<?php 

//Strip whitespace from the beginning and end of a string



require("header.php");
?>

<script type="text/javascript">
    function doCheck()
    {
        var name = document.getElementById("name");
        var username = document.getElementById("username")
        var password = document.getElementById("password");
        var conpassword = document.getElementById("conpassword");
        var email = document.getElementById("email")

        if(name.value=="")
        {
            alert("Please enter your name.");
            return false;
        }

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

        if(password.value!=conpassword.value)
        {
            alert("These passwords do not match.");
            return false;
        }

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
                <h3>Sign Up</h3>

                <form action="inc/signUp.php" method="post" id="signUp" onsubmit= "return doCheck()">

                    <p>Required fields are marked <span class="required">*</span></p>

                    <div>
                        <label for="name">Name *</label>
                        <input class="span4" type="text" name="name" id="name" value="" size="22">
                    </div>

                    <div>
                        <label for="username">Chose your username *</label>
                        <input class="span4" type="text" name="username" id="username" value="" size="22">
                    </div>

                    <div>
                        <label for="password">Create a password *</label>
                        <input class="span4" type="password" name="password" id="password" value="" size="22">
                    </div>

                    <div>
                        <label for="conpassword">Confirm your password *</label>
                        <input class="span4" type="password" name="conpassword" id="conpassword" value="" size="22">
                    </div>

                    <div>
                        <label for="email">Email *</label>
                        <input class="span4" type="text" name="email" id="email" value="" size="22">
                    </div>

                     <div>
                        <label for="gender">Gender</label>
                        <select class="span4" name="gender" id="gender">
                        <option value="">I am...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        </select>
                    </div>                   
                    <div>
                        <input class="btn" name="submit" type="submit" id="submit" value="Sign Up">
                    </div>

                </form>

            </div>
            </div>
        </div>
    </div>                                        
</div>
<!-- End of Page Container -->

<?php require("footer.php");?>