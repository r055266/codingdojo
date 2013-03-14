<?php 
require_once('head.php');
require_once('nav.php');
?>
    <div class="container">
        <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <?php
        if(isset($admin))
        {
        ?>
        <div class="row">
          <div class="span6">
            <h2>Manage Users</h2>
          </div>
          <div class="span3">
            <button class="btn btn-primary">Add new</button>
          </div>
        </div>
        <?php
        }
          echo $table
        ?>
      </div>
    </div> <!-- /container -->
	</body>
</html>