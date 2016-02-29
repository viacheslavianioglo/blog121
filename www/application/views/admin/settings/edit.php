
<h1><?=$pagetitle?></h1>


<?=form_open ('admin/settings/edit', array('class' => "pure-form"))?>

<div class="form-group">
    <label>Items per page:</label>
    <input type="text" class="form-control" name="cms_per_page" size=6 value="<?=set_value('cms_per_page',$this->config->item ('cms_per_page'))?>">
</div>


<input class="btn btn-default" type="submit" value="Save">




</form>

<div class="alert alert-danger"><?=validation_errors()?></div>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
