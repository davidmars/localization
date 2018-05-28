<?php
require("Localization/Lang.php");
use Localization\Lang;


?>

<?php
$all=Lang::allFromJson();
?>
<h1>All Languages</h1>
<table border="1">
    <tr>
        <th>code</th>
        <th>name</th>
        <th>localName</th>
        <th>flagUrl()</th>
    </tr>
    <?foreach ($all as $lang):?>
        <tr>
            <td><?=$lang->code?></td>
            <td><?=$lang->name?></td>
            <td><?=$lang->localName?></td>
            <td>
                <code><? echo $lang->flagUrl()?></code><br>
                <img src="<? echo $lang->flagUrl("flags/")?>">
            </td>
        </tr>
    <?endforeach;?>
</table>

<?php
$all=Lang::allFromLangCodes(["en","fr","ru","es","zh","ja","de","it"]);
?>

<h1>Only selected languages</h1>
<table border="1">
    <tr>
        <th>code</th>
        <th>name</th>
        <th>localName</th>
        <th>flagUrl()</th>
    </tr>
    <?foreach ($all as $lang):?>
        <tr>
            <td><?=$lang->code?></td>
            <td><?=$lang->name?></td>
            <td><?=$lang->localName?></td>
            <td>
                <code><? echo $lang->flagUrl()?></code><br>
                <img src="<? echo $lang->flagUrl("flags/")?>">
            </td>
        </tr>
    <?endforeach;?>
</table>
