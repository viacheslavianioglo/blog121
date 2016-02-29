<h1><?=$pagetitle?></h1>

<form action="<?=base_url().'admin/links/add'?>"  class = "pure-form" method="post">
        <div class="form-group">
        <label>ID for link</label>
        <input class="form-control" type="text" name="link_id" value="<?=set_value('link_id')?>" >
        </div>
        <div class="form-group">
         <label>Text for link</label>
        <input class="form-control" type="text" name="desc" value="<?=set_value('desc')?>">
        </div>
        <div class="form-group">
         <label>URL for link</label> <input class="form-control" type="text" name="url" value="<?=set_value('url')?>" >
        </div>
        <input class="btn btn-default" type="submit" value="Add new link" >
    </form>

    <div class="alert alert-danger"><?=validation_errors()?></div>






