<h1><?=$pagetitle?></h1>

<? if (!empty ($list)): ?>

    <table class="table">

    <tr>
    <td id="tdh" ><b><?=anchor ('account/pages/sort/page_id','Page ID')?></b></td>
    <td id="tdh" ><b><?=anchor ('account/pages/sort/title','Title')?></b></td>
    <td id="tdh"><b>Text</b></td>
    <td id="tdh" ><b><?=anchor ('account/pages/sort/date','Date')?></b></td>
    <td id="tdh" ><b><?=anchor ('account/pages/sort/showed','Showed')?></b></td>
    <td id="tdh" ><b><?=anchor ('account/pages/sort/pages.category_id','Category')?></b></td>
    <td id="tdh" ><b><?=anchor ('account/pages/sort/pages.user_id','User')?></b></td>



    </tr>

<!--        --><?// print_r($list)?>

    <? foreach ($list as $one): ?>

    <tr>

    <td><?=anchor ('account/pages/show/'.$one['page_id'],$one['page_id']);?></td>
    <td><?=$one['title']?></td>
    <td><?=substr($one['text'], 0, 45). '...'?></td>
    <td><font color="#003366"><?=date("Y-m-d H:i:s", $one['date'])?></font></td>
     <td><?= $one['showed'] == 1 ? "YES" : "NO"?></td>
     <td><?=$one['name']?></td>
     <td><?=$one['login']?></td>


    </tr>

    <? endforeach; ?>

    </table>

    <p align="center"><?=$page_links?></p>

    <? else: ?>

    No records

    <? endif; ?>

    <?=form_open ('account/pages/search')?>

    <table align="center" border="0">

    <tr>
    <td>Search:<br><input type="text" name="str" value=""></td>
    <td><br><select name="field">
    <option value="page_id">Page ID</option>
    <option value="title">Page title</option>
    <option value="text">text</option>

    </select>
    </td>
    <tr>
    <td><input type="submit" value="Find"></td><td>&nbsp;</td>
    </tr>
    </tr>

    </table>

    </form>

    <br>

    <p><?=anchor ('account/pages/add','Add new page')?></p>
