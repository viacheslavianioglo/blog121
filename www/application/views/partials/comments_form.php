
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" action="<?=base_url().'account/comments/add'?>" method="post">
        <div class="form-group">
            <textarea class="form-control" name = "text" rows="3"></textarea>
        </div>

        <input type="hidden"  name = "date" value="<?=time()?>" />
        <input type="hidden"  name = "page_id" value="<?=$page_id?>" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="alert alert-danger"><?= $this->session->flashdata('comment_error');?></div>
</div>

<hr>

