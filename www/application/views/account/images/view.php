<h1><?=$pagetitle?></h1>

<div align="left" style="padding:0px 20px" id="article">
    <?=img(array('src'=> base_url(). 'img/'.$filename))?>
</div>



<p><?=anchor ('account/images/del/'. $image_id,'Delete image')?></p>
<p><?=anchor ('account/images','back to list of images')?></p>
