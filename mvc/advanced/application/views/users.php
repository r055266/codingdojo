<?php 
require_once('head.php');
require_once('nav.php');

$your_profile = FALSE;
if($session['id'] == $user[0]->id)
{
	$your_profile = TRUE;
}
?>
    <div class="container">
        <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <div class="row">
        	<div class="span9">
	        	<?php
	        	if(isset($user))
	        	{
	        	?>
					<h1><?php echo $user[0]->first_name . ' ' . $user[0]->last_name; ?></h1>
					<p>Registered at: <?php echo $user[0]->created_at; ?></p>
					<p>User ID: #<?php echo $user[0]->id; ?></p>
					<p>Email Address: <?php echo $user[0]->email; ?></p>
					<p>Description: <?php echo $user[0]->description; ?></p>
					<?php 
						if($your_profile)
						{
						 echo '<a href="' . base_url('users/edit/'.$user[0]->id) . '">Edit Profile</a>';
						}
					?>
					<h3>Leave a message
					<?php 
						if(!$your_profile)
						{
							echo ' for '.$user[0]->first_name; 
						}
					?>
					</h3>
	        	<?php 
	        	}

	        	echo $posts;
	        	?>
        	</div>
        </div>
      </div>
    </div> <!-- /container -->
	</body>
</html>
