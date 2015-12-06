<?php
use app\controllers\ItemFactory;

//显示数据
?>
<br>
<table class="table">
   <caption>今日订单</caption>
   <thead>
      <tr>
         <th>订单号</th>
         <th>菜品</th>
         <th>数量</th>
      </tr>
   </thead>
   <tbody>
   <p></p>
<?php
$datetime = date('ymd');
$itemqian = $datetime.'000';
foreach ($res as $value) {
	$itemFactory = ItemFactory::getinstance();
	$itemname    = $itemFactory->whichname($value['item_id']);
	if ($value['order_id'] == $itemqian) {
		?>
						<tr><td></td><td><?php echo $itemname;
		?></td><td><?php echo $value['number'];
		?></td></tr>
		<?php
	} else {
		//调用工厂类
		$allPrice = $itemFactory->itemFullPrice($value['order_id']);
		?>
						<tr><td>总价：</td><td><?php echo $allPrice;
		?>元</td><td></td><tr><tr><td><?php echo $value['order_id'];
		?></td><td><?php echo $itemname;
		?></td><td><?php echo $value['number'];
		?></td></tr>
		<?php
		$itemqian = (int) ($itemqian)+1;
		$itemqian = (string) ($itemqian);
	}
}
?>
   </tbody>
</table>