<?php

$a_active = get_item_spec(0,'*',array('type'=>'Active'));
$a_consomable = get_item_spec(0,'*',array('type'=>'Consumable'));
$a_item = get_item_spec(0,'*',array('type'=>'Item'));

$temp_active = $a_active;
foreach($temp_active as $nb => $pp){
	$a_active[$nb]['description'] = unserialize($temp_active[$nb]['description']);
}

$temp_consomable = $a_consomable;
foreach($temp_consomable as $nb => $pp){
	$a_consomable[$nb]['description'] = unserialize($temp_consomable[$nb]['description']);
}

$temp_item = $a_item;
foreach($temp_item as $nb => $pp){
	$a_item[$nb]['description'] = unserialize($temp_item[$nb]['description']);
}


//pr($a);

echo "<table>";
foreach($a_item as $k => $v){
	echo "<tr>";
	echo "<td>";
	echo "<img src='".SMFR_ITEM_URL."/front/img/items/".$v['icon_id'].".jpg' >";
	echo "</td>";
	echo "<td>";
	echo "<h3>".$v['name']."</h3>";
	echo "Prix : ".$v['prix']." <br>";
	echo $v['description']['Description']." <br>";
	foreach($v['description']['Menuitems'] as $b => $t){
		echo $t['Description']." ".$t['Value']."<br>";
	}
	echo $v['description']['SecondaryDescription']." <br>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

//Array
//(
//	  [id] => 9848
//    [child_id] => 9847
//    [root_id] => 9847
//    [name] => Anneau enchanté
//    [icon_id] => 2832
//    [description] => Array
//(
//	    [Description] =>
//		[Menuitems] => Array
//(
//	[0] => Array
//	(
//		[Description] => Puissance magique
//                            [Value] => +30
//                        )
//
//                    [1] => Array
//(
//	    [Description] => Vitesse d'attaque
//                            [Value] => +10%
//                        )
//
//                )
//
//            [SecondaryDescription] =>
//        )
//
//    [tier] => 2
//    [prix] => 385
//    [short_description] =>
//    [start_item] => 0
//    [type] => Item
//)