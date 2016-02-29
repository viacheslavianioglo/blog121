<h1><?=$pagetitle?></h1>

<form action="<?=base_url().'admin/categories/add'?>"  class = "pure-form" method="post">
        <div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="<?=set_value('name')?>" >
        </div>
        <div class="form-group">
         <label>Description</label>
        <input class="form-control" type="text" name="desc" value="<?=set_value('desc')?>">
        </div>

        <input class="btn btn-default" type="submit" value="Add new link" >
    </form>

    <div class="alert alert-danger"><?=validation_errors()?></div>






