<h1><?=$pagetitle?></h1>

<!--	--><?//=form_open ('admin/links/edit/'.$link_id); ?>
    <form action="<?=base_url().'admin/categories/edit/'.$category_id?>" class = "pure-form" method="post" >




        <div class="form-group">
        <label>Category ID</label>
            <label class="form-control"><?=$category_id?></label>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="<?=set_value ('name',$name)?>">
        </div>

        <div class="form-group">
        <label>Name for link</label>
        <input class="form-control" type="text" name="desc" value="<?=set_value ('desc',$desc)?>">
        </div>



        <input class="btn btn-default" type="submit" value="Update">

    </form>

    <div class="alert alert-danger"><?=validation_errors()?></div>


<p><b>ID:</b> <?=$category_id?></p>
<p><b>Name:</b> <?=$name?></p>
<p><b>Description:</b> <?=$desc?></p>