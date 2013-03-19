<?php 
require_once('head.php');
?>
    <div class="container">
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
          <h2>Login</h2>
          <?php 
            if(isset($error))
            { 
              echo $error; 
            } 
          ?>
          <?php echo form_open(base_url('users/login')); ?>
            <div class="control-group">
              <label class="control-label" for="email">Email Address:</label>
              <div class="controls">
                <input type="text" name="email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input type="password" name="password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <a href="<?php echo base_url('users/register'); ?>">Register</a> or <button type="submit" class="btn btn-success">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
	</body>
</html>