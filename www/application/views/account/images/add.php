    <h1><?=$pagetitle?></h1>
    <?= form_open_multipart('account/images/add', array('class' => "pure-form"));?>

    <div class="form-group">

    <input type="file" name="userfile" size="20" />


    </div>
    <input type="submit" value="upload" />

    </form>

    <div class="alert alert-danger"><?=$this->session->flashdata('msg')?></div>

