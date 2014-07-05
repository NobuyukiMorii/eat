<?php echo $this->Restaurants->write_get_location_button("もう一度探す");?>


<table>
	<tr>
	<th>名前</th>
	<th>住所</th>
	<th>電話番号</th>
	<th>カテゴリー</th>
	</tr>
	<?php
	for ($i = 0 ; $i < $info[$i]; $i++) {
		echo '<tr>';
		echo '<td><a target="_blank" href='.$info[$i]['url'].'>'.$info[$i]['name'].'</a></td>';
		echo '<td>'.$info[$i]['address'].'</td>';
		echo '<td>'.$info[$i]['tel_number'].'</td>';
		echo '<td>'.$info[$i]['category'].'</td>';
		echo '</tr>';
	}
	?>
</table>


