<h2>Listing <span class='muted'>Comments</span></h2>
<br>
<?php if ($comments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Post id</th>
			<th>Comment</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->post_id; ?></td>
			<td><?php echo $item->comment; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('comment/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('comment/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('comment/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('comment/create', 'Add new Comment', array('class' => 'btn btn-success')); ?>

</p>
