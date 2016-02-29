<!-- Page Content -->

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8" id="article">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?=$title?></h1>

            <!-- Author -->
            <p class="lead">
                by <?=anchor("users/".$user_id . "/pages", $login)?>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?=date("Y-m-d H:i:s", $date)?> / <span class="glyphicon glyphicon-eye-open"></span> <?=$previews?></p>


            <hr>

            <!-- Post Content -->
            <p class="lead"><?=$text?></p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
<!--            <div class="well">-->
<!--                <h4>Leave a Comment:</h4>-->
<!--                <form role="form">-->
<!--                    <div class="form-group">-->
<!--                        <textarea class="form-control" rows="3"></textarea>-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
<!---->
<!--            <hr>-->

            <?=show_add_comment_form()?>
            <?=show_all_comments($page_id)?>

            <!-- Posted Comments -->

            <!-- Comment -->
<!--            <div class="media">-->
<!--                <a class="pull-left" href="#">-->
<!--                    <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                </a>-->
<!--                <div class="media-body">-->
<!--                    <h4 class="media-heading">Start Bootstrap-->
<!--                        <small>August 25, 2014 at 9:30 PM</small>-->
<!--                    </h4>-->
<!--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                </div>-->
<!--            </div>-->

            <!-- Comment -->
<!--            <div class="media">-->
<!--                <a class="pull-left" href="#">-->
<!--                    <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                </a>-->
<!--                <div class="media-body">-->
<!--                    <h4 class="media-heading">Start Bootstrap-->
<!--                        <small>August 25, 2014 at 9:30 PM</small>-->
<!--                    </h4>-->
<!--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                    <!-- Nested Comment -->-->
<!--                    <div class="media">-->
<!--                        <a class="pull-left" href="#">-->
<!--                            <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                        </a>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">Nested Start Bootstrap-->
<!--                                <small>August 25, 2014 at 9:30 PM</small>-->
<!--                            </h4>-->
<!--                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <!-- End Nested Comment -->-->
<!--                </div>-->
<!--            </div>-->

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
                <h4>Article Category</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li> <?=anchor("categories/".$category_id . "/pages", $name)?></li>
                        </ul>
                    </div>
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




