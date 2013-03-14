<?php 
require_once('head.php');
require_once('nav.php');
?>
    <div class="container">
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
          <h2>Signin</h2>
          <?php echo form_open('login/process_login'); ?>
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
                <button type="submit" class="btn btn-success">Signin</button>
              </div>
            </div>
          </form>

          <a href="<?php echo base_url('register'); ?>">Don't have an account? Register</a>
        </div>
      </div>
    </div> <!-- /container -->
	</body>
</html>