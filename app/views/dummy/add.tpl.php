<form class="form-horizontal" action="<?php e(url('../add')); ?>" method="post">
	<legend>編集</legend>
	<div class="control-group">
		<label class="control-label" for="id">カラム1</label>
		<div class="controls">
			<input type="text" id="inf1" name="inf1" value="" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="id">カラム2</label>
		<div class="controls">
			<input type="text" id="inf2" name="inf2" value="" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="id">変更者</label>
		<div class="controls">
			<input type="text" id="set_nm" name="set_nm" value="system" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" class="btn btn-primary" value="保存" />
		</div>
	</div>
</form>

<br />
<a href="<?php e(url('../list')); ?>">一覧へ</a>