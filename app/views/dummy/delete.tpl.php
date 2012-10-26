<form class="form-horizontal" action="<?php e(url('../delete')); ?>" method="post">
	<legend>削除しますか？</legend>
	<input type="hidden" name="id" value="<?php e($data->id) ?>" /><br>
	<div class="control-group">
		<label class="control-label" for="id">ID</label>
		<div class="controls">
			<strong><?php e($data->id) ?></strong>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="id">カラム1</label>
		<div class="controls">
			<strong><?php e($data->inf1) ?></strong>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="id">カラム2</label>
		<div class="controls">
			<strong><?php e($data->inf2) ?></strong>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="id">変更者</label>
		<div class="controls">
			<strong><?php e($data->set_nm) ?></strong>
		</div>
	</div>
	<div class="form-actions">
		<input type="submit" class="btn btn-primary" value="削除" />
		<a href="<?php e(url('../list')); ?>" class="btn">キャンセル</a>
	</div>
</form>
