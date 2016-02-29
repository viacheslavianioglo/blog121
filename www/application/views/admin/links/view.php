<h1><?=$pagetitle?></h1>

<div align="left" style="padding:0px 20px">
    <p><b>ID link:</b> <?=$link_id?></p>
    <p><b>Description link:</b> <?=$desc?></p>
    <p><b>URL:</b> <?=$url?></p>
    <p><b>URL to go:</b> <?=base_url().'go/'.$link_id?></p>
    <p><b>Clicks:</b> <?=$clicks?></p>
    </div>

    <p><?=anchor ('admin/links/edit/'.$link_id,'Edit link')?></p>

    <p><?=anchor ('admin/links/del/'.$link_id,'Delete link')?></p>

    <p><?=anchor ('admin/links','back to list of links')?></p>
