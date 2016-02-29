<h1><?=$pagetitle?></h1>

<?=form_open ('account/pages/edit/'.$page_id, array('class' => "pure-form")); ?>

    <div class="form-group">
        <label>ID for page:</label>
        <label class="form-control"><?=$page_id?></label>
    </div>

    <div class="form-group">
        <label>Title:</label>
        <input class="form-control" type="text" name="title" value="<?=set_value ('title', $title)?>">
    </div>

    <div class="form-group">
        <label>Text</label>
        <textarea class="form-control" name="text"><?=set_value('text', $text)?></textarea>
    </div>


    <div class="form-group">
        <label>Category</label>
        <?=show_categories_as_dropdown($category_id)?>
    </div>


    <div class="form-group">
        <label>Showed</label>
        <input type="checkbox" name="showed" value="1" <?=set_checkbox('showed' ,"1", $showed == 1)?>/>
    </div>

    <input type="submit" value="Update">


    </form>

    <div class="alert alert-danger"><?=validation_errors()?></div>

<?=show_tinymce()?>