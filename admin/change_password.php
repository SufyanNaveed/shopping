<!-- include header file -->
<?php include 'header.php'; 


    $db = new Database(); 
    $db->select('admin','username',null,"admin_id = ". $_SESSION['admin_id'],null,0); 
    $result = $db->getResult();
 
?>


<div class="admin-content-container">
    <h2 class="admin-heading">Set New Password and Username</h2>
    <!-- Form -->
    <div class="row">
        <form id="changePassword" class="add-post-form col-md-6" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control username" placeholder="Username" value="<?php echo $result ? $result[0]['username'] : ''; ?>" required/>
                <input type="hidden" name="admin_id" class="admin_id" value="<?php echo $_SESSION['admin_id'] ? $_SESSION['admin_id'] : ''; ?>">
            </div>
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="old_pass" class="form-control old_pass" placeholder="Old Password"  required/>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_pass" class="form-control new_pass" placeholder="New Password"  required/>
            </div>
            <input type="submit" name="save" class="btn add-new" value="Submit">
        </form>
    </div>
    <!-- /Form -->
</div>
<?php include "footer.php";   ?>