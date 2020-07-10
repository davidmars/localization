<?php
require("Localization/Lang.php");
use Localization\Lang;
Lang::$flagsUrlBasePath="flags/";

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
    <?php foreach ($all as $lang):?>
        <tr>
            <td><?php echo $lang->code?></td>
            <td><?php echo $lang->name?></td>
            <td><?php echo $lang->localName?></td>
            <td>
                <code><?php echo $lang->flagUrl()?></code><br>
                <img src="<?php echo $lang->flagUrl()?>">
            </td>
        </tr>
    <?php endforeach; ?>
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
    <?php foreach ($all as $lang):?>
        <tr>
            <td><?php echo $lang->code?></td>
            <td><?php echo $lang->name?></td>
            <td><?php echo $lang->localName?></td>
            <td>
                <code><?php echo $lang->flagUrl()?></code><br>
                <img src="<?php echo $lang->flagUrl()?>">
            </td>
        </tr>
    <?php endforeach; ?>
</table>
