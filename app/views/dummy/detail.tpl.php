<h1>Dummyデータ詳細</h1>
<br />
<table class="table table-bordered table-striped">
<tr>
    <th align="right">ID: </th>
    <td><?php e($detail->id) ?></td>
</tr>
<tr>
    <th align="right">カラム1: </th>
    <td><?php e($detail->inf1) ?></td>
</tr>
<tr>
    <th align="right">カラム2: </th>
    <td><?php e($detail->inf2) ?></td>
</tr>
<tr>
    <th align="right">変更日時: </th>
    <td><?php e($detail->set_date) ?></td>
</tr>
<tr>
    <th align="right">変更者: </th>
    <td><?php e($detail->set_nm) ?></td>
</tr>
</table>
<br />
<a href="<?php e(url('../list')); ?>">一覧へ</a>