<h1><?=$pagetitle?></h1>


<?=form_open ('account/lunit/settings', array('class' => "pure-form"))?>

<div class="form-group">
    <label>Login:</label>
    <label><?=$login?></label>
</div>

<div class="form-group">
    <label>New password:</label>
    <input type="password" class="form-control" name="pass" value="">
</div>

<div class="form-group">
    <label>Repeat new password:</label>
    <input type="password" class="form-control" name="repeat_pass" value="">
</div>


<div class="form-group">
    <label>Current avatar:</label>
    <div id="image-holder"><?=img(array('src'=> $avatar, "class" => 'img_avatar'))?></div>
    <br>
    <label>Select avatar:</label>
    <?=show_select_avatar_list($user_id)?>
    <input name = "avatar" id="avatar" type="hidden" value="<?=$avatar?>">

</div>

<input class="btn btn-default" type="submit" value="Save">

</form>

<div class="alert alert-danger"><?=validation_errors()?></div>

<script type="application/javascript">
    $('table li a').click(function () {
        var url = $(this).attr('href'),
            image = new Image();
        image.src = url;
        image.className = 'img_avatar';
        image.onload = function () {
            $('#image-holder').empty().append(image);
            $("#avatar").val(url)
        };
        image.onerror = function () {
            $('#image-holder').empty().html('That image is not available.');
        }

        $('#image-holder').empty().html('Loading...');

        return false;
    });
</script>
