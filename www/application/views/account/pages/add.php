
<h1><?=$pagetitle?></h1>

    <form action=<?=base_url()."account/pages/add"?> method="post"  class = "pure-form">
<!--        <div class="form-group">-->
<!--            <label>ID for page</label>-->
<!--            <input class="form-control" type="text" name="page_id" value="--><?//=set_value('page_id')?><!--" />-->
<!--        </div>-->

         <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="<?=set_value('title')?>"/>
         </div>


        <div class="form-group">
             <label>Text</label>
             <textarea class="form-control" name="text"><?=set_value('text')?></textarea>
        </div>

        <div class="form-group">
            <label>Category</label>
            <?=show_categories_as_dropdown()?>
        </div>

        <div class="form-group">
             <label>Show</label>
            <input  type="checkbox" name="showed" value= "1" <?=set_checkbox('showed' ,'1', true)?>/>
        </div>


        <input type="hidden"  name = "date" value="<?=time()?>" />
        <input type="submit" value="Add new page" />
    </form>

    <div class="alert alert-danger"><?=validation_errors()?></div>



<?=show_tinymce()?>

