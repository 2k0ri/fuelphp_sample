<h2>Viewing <span class='muted'>#<?php echo $comment->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $comment->id; ?></p>
<p>
	<strong>Post id:</strong>
	<?php echo $comment->post_id; ?></p>
<p>
	<strong>Comment:</strong>
	<?php echo $comment->comment; ?></p>

<?php echo Html::anchor('comment/edit/'.$comment->id, 'Edit'); ?> |
<?php echo Html::anchor('comment', 'Back'); ?>