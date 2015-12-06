<h2>输入数量</h2>
<form role="form" action="index.php?r=order/insert" method="post">
<?php
foreach ($res as $value) {
	$value['id'] = "i".$value['id'];?>
				<div class="col-xs-3"><span><?php echo $value['item_name'];?></span></div>
				<div class="col-xs-9"><input value="0" class="form-control" type="text" name="<?php echo $value['id'];?>"></div>
				<br><br>
	<?php
}
?>
<div class="btn-group">
    <input type="submit" class="btn btn-success col-lg-6" value="提交">
    <input type="reset" class="btn btn-primary col-lg-6" value="重置">
</div>
</form>