


<h1><?=$pagetitle?></h1>

    <? if (!empty ($list)): ?>

        <table class= 'table'>

            <tr>
                <td id="tdh" ><b><?=anchor ('account/images/sort/originfilename','File Name')?></b></td>
                <td id="tdh" ><b>Preview</b></td>


            </tr>

            <!--        --><?// print_r($list)?>

            <? foreach ($list as $one): ?>

                <tr>

                    <td><?=anchor ('account/images/show/'.$one['image_id'],$one['originfilename']);?></td>
                    <td><?=img(array('src'=> base_url(). 'img/'.$one['filename'], 'width' => 100))?></td>

                </tr>

            <? endforeach; ?>

        </table>

        <p align="center"><?=$page_links?></p>

    <? else: ?>

        No records

    <? endif; ?>

    <?=form_open ('account/images/search', array('class' => "pure-form" ))?>

    <table align="center" border="0">

        <tr>
            <td>Search:<br><input type="text" name="str" value=""></td>
            <td><br><select name="field">
                    <option value="originfilename">Filename</option>
                </select>
            </td>
        <tr>
            <td><input type="submit" value="Find"></td><td>&nbsp;</td>
        </tr>
        </tr>

    </table>

    </form>

    <br>

    <p><?=anchor ('account/images/add','Add new image')?></p>


