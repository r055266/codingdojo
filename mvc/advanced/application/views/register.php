<?php 
require_once('head.php');
require_once('nav.php');

$submit_label = 'Register';
$heading = 'Register';
$dashboard_return = '';
$process = 'process/registration';

if(isset($new_user))
{
  $submit_label = 'Create';
  $heading = 'Add a new user';
  $dashboard_return = '<div class="row"><div class="span9"><a class="btn btn-primary pull-right" href="'. base_url('dashboard/admin') .'">Return to Dashboard</a></div></div>';
  $process = 'process/new_user';
}
?>
    <div class="container">
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
          <h3><?php echo $heading; ?></h3>
          <?php 
            
            echo $dashboard_return;

            if(isset($success))
            {
              echo '<div class="alert alert-success">'. $success .'</div>';
            }
            echo form_open(base_url($process)); 
          ?>
            <div class="row">
              <div class="span9">
                <div class="control-group">
                  <?php echo form_error('email'); ?>
                  <label class="control-label" for="email">Email Address:</label>
                  <div class="controls">
                    <input type="text" name="email">
                  </div>
                </div>
                <div class="control-group">
                  <?php echo form_error('first_name'); ?>
                  <label class="control-label" for="first_name">First Name:</label>
                  <div class="controls">
                    <input type="text" name="first_name">
                  </div>
                </div>
                <div class="control-group">
                  <?php echo form_error('last_name'); ?>
                  <label class="control-label" for="last_name">Last Name:</label>
                  <div class="controls">
                    <input type="text" name="last_name">
                  </div>
                </div>
                <div class="control-group">
                  <?php echo form_error('password'); ?>
                  <label class="control-label" for="password">Password:</label>
                  <div class="controls">
                    <input type="password" name="password">
                  </div>
                </div>
                <div class="control-group">
                  <?php echo form_error('passconf'); ?>
                  <label class="control-label" for="passconf">Password Confirmation:</label>
                  <div class="controls">
                    <input type="password" name="passconf">
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <button type="submit" class="btn btn-success"><?php echo $submit_label; ?></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <?php
          if(!isset($new_user))
          {
          ?>
          <a href="<?php echo base_url('signin'); ?>">Already have an account? Login</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div> <!-- /container -->
	</body>
</html>