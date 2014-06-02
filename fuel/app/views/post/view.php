<h2>Viewing <span class='muted'>#<?php echo $Post->id; ?></span></h2>

<p>
	<strong>Id:</strong>
	<?php echo $Post->id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $Post->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $Post->body; ?></p>

<?php echo Html::anchor('post/edit/'.$Post->id, 'Edit'); ?> |
<?php echo Html::anchor('post', 'Back'); ?>