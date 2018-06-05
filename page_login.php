<div class="row">
                <div class="offset-md-4 col-md-4 ">
                    <!-- from start --> 
                    <?php 
                    if(isset($_SESSION['checkLogin'])) {
                        echo "<a href='Logout.php'>".$_SESSION['checkLogin']."</a>";

                        if($_SESSION['checkLogin'] == true )
                        {
                                $showFromLogin = false; 
                        }
                        else if($_SESSION['checkLogin'] == false )
                        {
                            echo '<script>alert("login fail");</script>';
                            $showFromLogin = true;
                        }
                    }
                    else
                    {
                        $showFromLogin = true; 
                    }

                    ?>
                    <?php if($showFromLogin)
                    {
                        ?>
                    <form action="login.php" class="form-conatiner" method="post">
                        <div class="form-group">
                            <label for="InputUserName">
                                Username
                            </label>
                            <input class="form-control" maxlength="10" name="username_" placeholder="Username" type="text"/>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">
                                Password
                            </label>
                            <input class="form-control" maxlength="10" name="password_" placeholder="Password" type="password"/>
                        </div>
                        <button class="btn btn-success btn-block" type="submit" name="login_">
                            Login
                        </button>
                        <p class="meseage">
                            Not Registered?
                            <a href="?page=register">
                                Registered
                            </a>
                        </p>

                        
                    </form> 
                    <?php  } //end if showLogin?>

                    <!-- from end-->
                </div>
                <!-- End div form -->
            </div>