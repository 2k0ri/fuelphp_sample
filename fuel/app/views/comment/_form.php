<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($comment) ? $comment->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Post id', 'post_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('post_id', Input::post('post_id', isset($comment) ? $comment->post_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Post id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>

				<?php echo Form::input('comment', Input::post('comment', isset($comment) ? $comment->comment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Comment')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>