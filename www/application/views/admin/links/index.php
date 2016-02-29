<h1><?=$pagetitle?></h1>

<? if (!empty ($list)): ?>

    <table class= 'table'>

    <tr>
    <td id="tdh" ><b><?=anchor ('admin/links/sort/link_id','Link ID')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/links/sort/desc','Link name')?></b></td>
    <td id="tdh"><b><?=anchor ('admin/links/sort/url','Link URL')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/links/sort/clicks','Clicks')?></b></td>

    </tr>

<!--        --><?// print_r($list)?>

    <? foreach ($list as $one): ?>

    <tr>

    <td><?=anchor ('admin/links/show/'.$one['link_id'],$one['link_id']);?></td>
    <td><?=$one['desc']?></td>
    <td><a href="<?=$one['url']?>" target="_blank"><?=$one['url']?></a></td>
    <td><font color="#003366"><?=$one['clicks']?></font></td>

    </tr>

    <? endforeach; ?>

    </table>

    <p align="center"><?=$page_links?></p>

    <? else: ?>

    No records

    <? endif; ?>

    <?=form_open ('admin/links/search', array('class' => "pure-form" ))?>

    <table align="center" border="0">

    <tr>
    <td>Search:<br><input type="text" name="str" value=""></td>
    <td><br><select name="field">
    <option value="link_id">Link ID</option>
    <option value="desc">Link Name</option>
    <option value="url">URL</option>

    </select>
    </td>
    <tr>
    <td><input type="submit" value="Find"></td><td>&nbsp;</td>
    </tr>
    </tr>

    </table>

    </form>

    <br>

    <p><?=anchor ('admin/links/add','Add new link')?></p>
