

<!-- Page Content -->

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <? if (!empty ($list)): ?>

                <? foreach ($list as $one): ?>
                    <h2><?=anchor ('pages/show/'.$one['page_id'],$one['title']);?></h2>
                    <div><?=substr($one['text'], 0, 45). '...'?></div>
                    <hr />

                <? endforeach; ?>


                <p align="center"><?=$page_links?></p>

            <? else: ?>

                No pagees

            <? endif; ?>



        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <?=form_open ('pages/searchpage',array("method" => "post") )?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="searchstr" value="<?=set_value('searchstr')?>">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                </form>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <?=show_categories_as_list()?>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

