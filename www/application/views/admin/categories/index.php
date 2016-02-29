<h1><?=$pagetitle?></h1>

<? if (!empty ($list)): ?>

    <table class= 'table'>

    <tr>
    <td id="tdh" ><b><?=anchor ('admin/categories/sort/name','Category Name')?></b></td>
    <td id="tdh" ><b><?=anchor ('admin/categories/sort/desc','Description')?></b></td>

    </tr>

<!--        --><?// print_r($list)?>

    <? foreach ($list as $one): ?>

    <tr>

    <td><?=anchor ('admin/categories/show/'.$one['category_id'],$one['name']);?></td>
    <td><?=$one['desc']?></td>


    </tr>

    <? endforeach; ?>

    </table>

    <p align="center"><?=$page_links?></p>

    <? else: ?>

    No records

    <? endif; ?>

    <?=form_open ('admin/categories/search', array('class' => "pure-form" ))?>

    <table align="center" border="0">

    <tr>
    <td>Search:<br><input type="text" name="str" value=""></td>
    <td><br><select name="field">
    <option value="name">Category Name</option>
    <option value="desc">Description</option>

    </select>
    </td>
    <tr>
    <td><input type="submit" value="Find"></td><td>&nbsp;</td>
    </tr>
    </tr>

    </table>

    </form>

    <br>

    <p><?=anchor ('admin/categories/add','Add new category')?></p>
