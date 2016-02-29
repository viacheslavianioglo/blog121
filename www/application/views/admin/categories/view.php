<h1><?=$pagetitle?></h1>

<div align="left" style="padding:0px 20px">
    <p><b>ID:</b> <?=$category_id?></p>
    <p><b>Name:</b> <?=$name?></p>
    <p><b>Description:</b> <?=$desc?></p>
    </div>

    <p><?=anchor ('admin/categories/edit/'.$category_id,'Edit link')?></p>

    <p><?=anchor ('admin/categories/del/'.$category_id,'Delete link')?></p>

    <p><?=anchor ('admin/categories','back to list of categories')?></p>
