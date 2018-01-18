<p class="clickable unselectable" id="login-register">Login/Register</p>
<div id="login-window" class="remove">
    <div class="clickable" id="cancelForm">x</div>
    <div class="cleaner"></div>
    <p class="clickable unselectable selected" id="login">Login</p>
    <p class="clickable unselectable unselected" id="register">Register</p>
    <div class="cleaner"></div>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <input type="hidden" name="type" value="login" id="loginorregister">
        <div class="form-group">
            <div id="register-forms" class="remove">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" name="tbFirstname" id="tbFirstname">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" name="tbLastname" id="tbLastname">
                    </div>
                </div>
                <div class="row">
                    <div class="col"><input type="text" class="form-control" placeholder="Email" name="tbEmail" id="tbEmail"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+381</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Phone (optional)" name="tbPhone" id="tbPhone">
                        </div>
                    </div>
                </div>
            </div>
            <?php
    if(isset($_REQUEST['btnSubmit'])){
        if($_REQUEST['type']=='register'){

            $firstname = $_REQUEST['tbFirstname'];
            $lastname = $_REQUEST['tbLastname'];
            $email = $_REQUEST['tbEmail'];
            $phone = $_REQUEST['tbPhone'];
            $username = $_REQUEST['tbUsername'];
            $password = md5($_REQUEST['tbPassword']);

            $query = "INSERT INTO users VALUES ('', '".$username."', '".$password."', '".$firstname."', '".$lastname."', '".$email."', ".$phone.", 0);";
            $query_result = mysqli_query($conn,$query);
        }
        else if($_REQUEST['type']=='login'){
        $username = $_REQUEST['tbUsername'];
        $password = md5($_REQUEST['tbPassword']);
        $query = "SELECT * FROM users WHERE username='".$username."'";
        $query_result = mysqli_query($conn,$query);
        if(!mysqli_num_rows($query_result)){
            $user_report='<div class="row">
                <div class="col">
                <p>That username does not exist.</p>
                </div>
            </div>';
        }
        $user_result = mysqli_fetch_array($query_result);
        if($password==$user_result['password'])
        {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $password==$user_result['role'];
        }
        else 
        {
            $password_report = '<div class="row">
                <div class="col">
                <p>That password is wrong.</p>
                </div>
            </div>';
        }
    }
}
        echo '<div class="row">
                <div class="col"><input type="text" class="form-control" placeholder="Username" name="tbUsername" id="tbUsername"></div>
            </div>';
        
        if(isset($user_report)){
        echo $user_report;
        }
          
        echo '<div class="row">
                <div class="col"><input type="password" class="form-control" placeholder="Password" name="tbPassword" id="tbPassword"></div>
            </div>';
        if(isset($password_report)){
        echo $password_report;
        }
?>
                <div class="row">
                    <div class="col"><button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit">Login</button></div>
                </div>
        </div>
    </form>
</div>
