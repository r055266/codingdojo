<?php
include_once('include/header.php');

date_default_timezone_set('America/Los_Angeles');

function comment_form($id, $message_id){
	$comment_form = '<form id="new_comments" name="new_comments" action="process.php" method="post">';
	$comment_form .= '<textarea name="new_comment" id="comment" cols="60" rows="1"></textarea>';
	$comment_form .= '<input type="hidden" name="message_id" value="'. $message_id .'">';
	$comment_form .= '<input type="hidden" name="profile_id" value="' . $id .'">';
	$comment_form .= '<input type="hidden" name="post_comment" value="1">';
	$comment_form .= '<input class="comment" type="submit" name="submit" value="comment">';
	$comment_form .= '</form>';

	return $comment_form;
}

if(!$_SESSION['logged_in'])
{
	header('location: index.php');
	exit;
}

// $class = 'success';
// if($_SESSION['error'])
// {
// 	$error = true;
// 	$class = 'error_message';
// }

if(!isset($_GET['id']))
{
	header('location: profile.php?id=' . $_SESSION['id']);
	exit;
}
else
{
	$id = $_GET['id'];
}

?>	
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#new_messages, #new_comments, #remove_message, #remove_comment').submit(function(){
				$.post(
						$(this).attr('action'),
						$(this).serialize(),
						function(data){
							$('.error_message, .success').remove();
							if(data.error){
								$('#new_messages').before('<p class="error_message">' + data.message + '</p>');
							}
							else{
								$('#new_messages').before('<p class="success">' + data.message + '</p>');
							}
						},
						"json"
					);
				return false;
			});	
		});
	</script>
</head>
	<body>
		<div id="main_content">
			<div id="header">
				<div id="header_bar" class="wrapper">
					<img src="images/prayise_big.gif" alt="Prayise Logo">
					<?php echo display_profile($id); ?>
					<div class="clear"></div>
				</div>
			</div>
			<div id="page_content" class="wrapper profile">
				<div id="message_bar">
					<h2>Say a Prayise!</h2>
					<?php 
						// if(isset($_SESSION['message']))
						// {
						// 	echo '<p class="' . $class . '">' . $_SESSION['message'] . '</p>';
						// }
					?>
					<form id="new_messages" name="new_messages" action="process.php" method="post">
						<textarea name="new_message" id="message" cols="80" rows="10"></textarea>
						<input type="hidden" name="profile_id" value="<?php echo $id; ?>">
						<input type="hidden" name="post_message" value="1">
						<input class="prayise" type="submit" name="submit" value="PRAYISE">
					</form>
					<?php
						$display_message_sql = "SELECT messages.id message_id, messages.user_sent_id message_sender_id, messages.content message, messages.created_at message_created, comments.id comment_id, comments.users_id comment_recieved_id, comments.content comment, comments.display_flag display_comment, comments.created_at comment_created, users.first_name message_first_name, users.last_name message_last_name, u2.first_name comment_first_name, u2.last_name comment_last_name
												FROM users 
												LEFT JOIN messages ON users.id = messages.user_sent_id 
												LEFT JOIN comments ON messages.id = comments.messages_id
												LEFT JOIN users u2 ON comments.users_id = u2.id 
												WHERE messages.user_reciever_id = " . $conn->real_escape_string($id) . "
												AND messages.display_flag = 1
												ORDER BY messages.id DESC, messages.created_at DESC, comments.created_at ASC";
						$display_message_query = $conn->query($display_message_sql);
						$previous_message = '';
						$count = $display_message_query->num_rows-1;
						$i = 0;
						while($result = $display_message_query->fetch_object())
						{
							if($result->message_id != $previous_message)
							{
								if($previous_message != '')
								{
									echo comment_form($id, $previous_message);
									echo '</div>';
								}
								
								echo '<div class="message">';
								echo '<div class="message_content">';
								echo 	'<h4><a href="profile.php?id=' . $result->message_sender_id . '">' . $result->message_first_name . ' ' . $result->message_last_name . '</a> left a message on ' . date('M d, Y H:i', strtotime($result->message_created)) . '</h4>';
								
								if($_SESSION['id'] == $result->message_sender_id)
								{
									echo '<form id="remove_message" name="remove_message" action="process.php" method="post">';
									echo '<input type="hidden" name="message_delete" value="1">';
									echo '<input type="hidden" name="message_id" value="'. $result->message_id .'">';
									echo '<input type="hidden" name="profile_id" value="' . $id .'">';
									echo '<input type="submit" name="submit" value="Delete Message">';
									echo '</form>';
								}
								echo 	'<p>' . $result->message . '</p>';
								echo '</div>';
							}

							if($result->comment != NULL && $result->display_comment == 1)
							{
								echo '<div class="comment_content">';
								echo '<h5><a href="profile.php?id=' . $result->comment_recieved_id . '">' .$result->comment_first_name . ' ' . $result->comment_last_name . '</a> commented on ' . $result->message_first_name . ' ' . $result->message_last_name . '\'s message at ' . date('M d', strtotime($result->comment_created)) . '</h5>';
								if($_SESSION['id'] == $result->comment_recieved_id)
								{
									echo '<form id="remove_comment" name="remove_comment" action="process.php" method="post">';
									echo '<input type="hidden" name="comment_delete" value="1">';
									echo '<input type="hidden" name="comment_id" value="'. $result->comment_id .'">';
									echo '<input type="hidden" name="profile_id" value="' . $id .'">';
									echo '<input type="submit" name="submit" value="Delete Comment">';
									echo '</form>';
								}
								echo '<p>' . $result->comment .'</p>';
								echo '</div>';
							}

							if($count == $i)
							{
								echo comment_form($id, $result->message_id);
								echo '</div>';
							}

							$previous_message = $result->message_id;
							$i++;
						}
					?>
				</div>

			</div>
		</div>
	</body>
</html>
<?
	// unset($_SESSION['message'], $_SESSION['error']);
?>
