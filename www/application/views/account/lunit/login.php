<h1><?=$pagetitle?></h1>

<form class = "pure-form" action=<?=base_url()."account/lunit/login"?> method="post">
        <div class="form-group">
            <label>Login</label>
            <input class="form-control" type="text" name="login" value="<?=set_value('login')?>" />
         </div>
         <div class="form-group">
             <label>Password</label>
            <input class="form-control" type="password" name="pass" />
         </div>

        <input class="btn btn-default" type="submit" value="Login" />
    </form>

    <br />
    <br />
    <?=anchor("admin/lunit/register", "Registration")?>

    <div class="alert alert-danger"><?=validation_errors()?></div>




