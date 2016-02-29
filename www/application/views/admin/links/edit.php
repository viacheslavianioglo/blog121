<h1><?=$pagetitle?></h1>

<!--	--><?//=form_open ('admin/links/edit/'.$link_id); ?>
    <form action="<?=base_url().'admin/links/edit/'.$link_id?>" class = "pure-form" method="post" >




        <div class="form-group">
        <label>ID for link</label>
            <label class="form-control"><?=$link_id?></label>
        </div>

        <div class="form-group">
        <label>Name for link</label>
        <input class="form-control" type="text" name="desc" value="<?=set_value ('desc',$desc)?>">
        </div>

        <div class="form-group">
        <label>URL</label>
        <input class="form-control" type="text" name="url" value="<?=set_value ('url',$url)?>">
        </div>



        <input class="btn btn-default" type="submit" value="Update">

    </form>

    <div class="alert alert-danger"><?=validation_errors()?></div>
