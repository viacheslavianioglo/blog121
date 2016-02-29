<h1><?=$pagetitle?></h1>

<form id="target" class = "pure-form" action=<?=base_url()."admin/users/edit"?> method="post">

<? if (!empty ($list)): ?>

    <table class="table">

    <tr>
    <td id="tdh" ><b><?=anchor ('admin/users/sort/user_id','User ID')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/users/sort/login','Login')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/users/sort/avatar','Avatar')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/users/sort/role','Role')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/users/sort/banned','Banned')?></b></td>



    </tr>

<!--        --><?// print_r($list)?>

    <? foreach ($list as $one): ?>

    <tr >

    <td><?=$one['user_id']?></td>
    <td><?=$one['login']?></td>
    <td><?=img(array('src'=> $one['avatar'], "class" => 'img_avatar'))?></td>
    <td><?=$one['role']?></td>
    <td>
        <?=form_dropdown('', array( 1 => "YES",  0 => "NO"), $one['banned'], array("class" => 'form-control', "id" => 'select_' . $one['user_id']) )?>

    </td>



    </tr>

    <? endforeach; ?>

     <input type="hidden" name="user_id" value="">

    </table>

    <p align="center"><?=$page_links?></p>

    <? else: ?>

    No records

    <? endif; ?>
</form>

<script type="application/javascript">
    $( "select" ).change(function() {
        $id =  ($(this).attr("id")).split("_")[1];
        $(this).attr('name', 'banned');
//        console.log($id);
        $("input[name=user_id]").val($id);
        console.log($("input[name=user_id]").val());
        $( "#target" ).submit();
    });
</script>


<!--<div><pre>--><?//=var_dump($this->session->flashdata('msg'))?><!--</pre></div>-->



<!--    --><?//=form_open ('admin/pages/search')?>
<!---->
<!--    <table align="center" border="0">-->
<!---->
<!--    <tr>-->
<!--    <td>Search:<br><input type="text" name="str" value=""></td>-->
<!--    <td><br><select name="field">-->
<!--    <option value="page_id">Page ID</option>-->
<!--    <option value="title">Page title</option>-->
<!--    <option value="text">text</option>-->
<!---->
<!--    </select>-->
<!--    </td>-->
<!--    <tr>-->
<!--    <td><input type="submit" value="Find"></td><td>&nbsp;</td>-->
<!--    </tr>-->
<!--    </tr>-->
<!---->
<!--    </table>-->
<!---->
<!--    </form>-->


