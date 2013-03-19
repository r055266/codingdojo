<?php 
require_once('head.php');
?>
    <div class="container">
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
          <h3>Registration</h3>
          <?php 
            
            if(isset($success))
            {
              echo '<div class="alert alert-success">'. $success .'</div>';
            }
            echo form_open(base_url('register')); 
          ?>
            <div class="row">
              <div class="span9">
                <div class="control-group">
                  <?php if(isset($error)) { echo $error['email']; } ?>
                  <label class="control-label" for="email">Email Address:</label>
                  <div class="controls">
                    <input type="text" name="email">
                  </div>
                </div>
                <div class="control-group">
                  <?php if(isset($error)) { echo $error['first_name']; } ?>
                  <label class="control-label" for="first_name">First Name:</label>
                  <div class="controls">
                    <input type="text" name="first_name">
                  </div>
                </div>
                <div class="control-group">
                  <?php if(isset($error)) { echo $error['last_name']; } ?>
                  <label class="control-label" for="last_name">Last Name:</label>
                  <div class="controls">
                    <input type="text" name="last_name">
                  </div>
                </div>
                <div class="control-group">
                  <?php if(isset($error)) { echo $error['password']; } ?>
                  <label class="control-label" for="password">Password:</label>
                  <div class="controls">
                    <input type="password" name="password">
                  </div>
                </div>
                <div class="control-group">
                  <?php if(isset($error)) { echo $error['confirm_password']; } ?>
                  <label class="control-label" for="confirm_password">Password Confirmation:</label>
                  <div class="controls">
                    <input type="password" name="confirm_password">
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <a href="<?php echo base_url('login'); ?>">Login</a> or <button type="submit" class="btn btn-success">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
	</body>
</html>