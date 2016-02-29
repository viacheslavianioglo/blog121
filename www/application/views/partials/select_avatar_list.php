<? if (!empty ($list)): ?>

    <table class= 'table'>

        <!--        --><?// print_r($list)?>

        <? foreach ($list as $one): ?>
            <tr>
                <td><li class="list-item-1"><a href="<?=base_url(). 'img/'.$one['filename']?>"><img class = "img_avatar" src="<?=base_url(). 'img/'.$one['filename']?>" ></a></li></td>

            </tr>
        <? endforeach; ?>

    </table>

<? else: ?>
    No images
<? endif; ?>

<div id="image-holder"></div>

