<? if (!empty ($list)): ?>

    <? foreach ($list as $one): ?>
        <div class="media">
            <a class="pull-left" href="#">
<!--                <img class="media-object" src="http://placehold.it/64x64" alt="">-->
                <?=img(array('src'=> $one['avatar'], 'width' => 64, 'class'=>"media-object img_avatar"))?>
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?=$one['login']?>
                    <small><?=date("Y-m-d H:i:s", $one['date'])?></small>
                </h4>
                <?=$one['text']?>
            </div>
        </div>

    <? endforeach; ?>

<? else: ?>
    <div class="media">
        No comments
    </div>



<? endif; ?>