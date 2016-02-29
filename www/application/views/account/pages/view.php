<h1><?=$pagetitle?></h1>

<div align="left" style="padding:0px 20px" id="article">
    <p><b>ID page:</b> <?=$page_id?></p>
    <p><b>Title:</b> <?=$title?></p>
    <p><b>Text:</b> <?=$text?></p>
    <p><b>Date added:</b> <?=date("Y-m-d H:i:s", $date)?></p>
</div>

    <p><?=anchor ('account/pages/edit/'.$page_id,'Edit page')?></p>

    <p><?=anchor ('account/pages/del/'.$page_id,'Delete page')?></p>

    <p><?=anchor ('account/pages/','back to list of article')?></p>
