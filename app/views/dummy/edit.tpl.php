<form class="form-horizontal" action="<?php e(url('../edit')); ?>" method="post">
    <legend>編集</legend>
    <input type="hidden" name="id" value="<?php e($data->id) ?>" /><br>
    <div class="control-group">
        <label class="control-label" for="id">ID</label>
        <div class="controls">
            <input type="text" id="id" value="<?php e($data->id) ?>" disabled="disabled" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="id">カラム1</label>
        <div class="controls">
            <input type="text" id="inf1" name="inf1" value="<?php e($data->inf1) ?>" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="id">カラム2</label>
        <div class="controls">
            <input type="text" id="inf2" name="inf2" value="<?php e($data->inf2) ?>" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="id">変更者</label>
        <div class="controls">
            <input type="text" id="set_nm" name="set_nm" value="<?php e($data->set_nm) ?>" />
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input type="submit" class="btn" value="保存" />
        </div>
    </div>
</form>

<br />
<a href="<?php e(url('../list')); ?>">一覧へ</a>