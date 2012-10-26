<h1>Dummyデータ一覧</h1>
<br />
<?php include(realpath(dirname(__FILE__).'/../paginator.tpl.php')); ?>
<table class="table table-bordered table-striped">
<tr>
    <th>ID</th>
    <th>カラム1</th>
    <th>カラム2</th>
    <th>変更日時</th>
    <th>変更者</th>
    <th>&nbsp;</th>
</tr>
<?php foreach ($pageItems as $item) { ?>
<tr>
    <td><?php e($item->id) ?></td>
    <td><a href="<?php e(url('../detail', array('id' => $item->id))); ?>"><?php e($item->inf1) ?></a></td>
    <td><?php e($item->inf2) ?></td>
    <td><?php e($item->updated_at) ?></td>
    <td><?php e($item->set_nm) ?></td>
    <td>
    	<a href="<?php e(url('../edit', array('id' => $item->id))); ?>">編集</a>
    	<a href="<?php e(url('../delete', array('id' => $item->id))); ?>">削除</a>
    </td>
</tr>
<?php } ?>
</table>
<?php include(realpath(dirname(__FILE__).'/../paginator.tpl.php')); ?>
