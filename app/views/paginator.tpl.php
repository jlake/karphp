<?php if($totalItemCount > 1) { ?>
<p><strong><?php e($firstItemNumber) ?></strong>件から<strong><?php e($lastItemNumber) ?></strong>件 （検索結果<strong><?php e($totalItemCount) ?></strong>件中）</p>
<?php } ?>
<?php if($pageCount > 1) { ?>
<div class="pagination">
	<ul>
    <?php if($page > 1) { ?>
      <li><a href="<?php e($baseUrl) ?>page=<?php e($page - 1) ?>">前へ</a></li>
    <?php } else { ?>
      <li class="disabled"><a>前へ</a></li>
    <?php } ?>

    <?php for($i = $startPage; $i<=$endPage; $i++) { ?>
        <?php if($i == $page) { ?>
            <li class="disabled"><a><?php e($i) ?></a></li>
        <?php } else { ?>
            <li><a href="<?php e($baseUrl) ?>page=<?php e($i) ?>"><?php e($i) ?></a></li>
        <?php } ?>
    <?php } ?>

    <?php if($page < $pageCount) { ?>
      <li><a href="<?php e($baseUrl) ?>page=<?php e($page + 1) ?>">次へ</a></li>
    <?php } else { ?>
      <li class="disabled"><a>次へ</a></li>
    <?php } ?>
    </ul>
</div>
<?php } ?>
