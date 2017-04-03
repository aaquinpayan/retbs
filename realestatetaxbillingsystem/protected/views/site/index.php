<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
/*$this->breadcrumbs=array(
	'Accounts',
);*/

?>

<div>
	<?php 
		$users = User::model()->findAll();

		echo CHtml::openTag('table');
		echo CHtml::openTag('tr');
		echo CHtml::tag('th', array(), 'Name'); 
		echo CHtml::tag('th', array(), 'Username'); 
		echo CHtml::tag('th', array(), 'Password'); 
		echo CHtml::tag('th', array(), 'User Type'); 
		echo CHtml::closeTag('tr');

		foreach ($users as $user) {
			echo CHtml::openTag('tr');
			echo CHtml::tag('td', array(), $user->name);
			echo CHtml::tag('td', array(), $user->username); 
			echo CHtml::tag('td', array(), $user->password); 
			if($user->user_type == 1){
				echo CHtml::tag('td', array(), "Admin");
			}else if($user->user_type == 2){
				echo CHtml::tag('td', array(), "Assessor");
			}else if($user->user_type == 3){
				echo CHtml::tag('td', array(), "Treasurer");
			}else if($user->user_type == 4){
				echo CHtml::tag('td', array(), "Tax Payer");
			}
			echo CHtml::closeTag('tr');
		}
	?>
</div>
