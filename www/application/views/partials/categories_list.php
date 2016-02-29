<div class="col-lg-6">
    <? if (!empty ($list)): ?>
        <ul class="list-unstyled">

        <? foreach ($list as $one): ?>
           <li> <?=anchor("categories/".$one['category_id'] . "/pages", $one['name'])?></li>
        <? endforeach; ?>

         <li> <?=anchor("pages", "All")?></li>

        </ul>

    <? else: ?>

        No categories

    <? endif; ?>
</div>

