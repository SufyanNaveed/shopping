<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<div class="container">
    <div class="row py-2">
        <div class="col-md-offset-3 col-md-6">
           
            <!-- Form -->
            <form id="register_sign_up" class="signup_form" autocomplete="off">
                <h2>Forget Password?</h2>
                <div class="form-group">
                    <input type="email" name="username" class="form-control user_name" placeholder="Email Address" requried />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control pass_word" placeholder="New Password" requried />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control pass_word" placeholder="Confirm Password" requried />
                </div>
                <input type="submit" name="signup" class="btn" value="Submit"/>
            </form>
            <!-- /Form -->
        </div>
    </div>
</div>
    <?php include 'footer.php';