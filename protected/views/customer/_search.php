<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row-fluid">
		<div class="span3">
			<?php echo $form->textField($model,'nama',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Nama', 'onkeyup'=>'autoSuggestion(this)')); ?>
		</div>
		<div class="span3">
			<?php echo $form->textField($model,'kota',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Kota')); ?>
		</div>
		<div class="span3">
			<?php echo $form->textField($model,'negara',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Negara')); ?>
		</div>
		<div class="span3">
			<?php echo $form->textField($model,'email',array('span'=>12,'maxlength'=>45, 'placeholder'=>'Email')); ?>
		</div>
	</div>

	
	<?php echo TbHtml::submitButton('<i class="fa fa-search""></i> Search',  array('color' => TbHtml::BUTTON_COLOR_INFO,));?>
   

    <?php $this->endWidget(); ?>

</div><!-- search-form -->

<script>
// function autoSuggestion(obj){
  // var kd = obj.value;
  // $("#Customer_nama").autocomplete({
    // minLength:1,
    // source: function (kd, process) {
      // var url = '<?php echo Yii::app()->createUrl('Customer/GetNama'); ?>';            
      // $.post( url,
      // { 
        // kd : kd,
      // },
      // function(data){
        // process(data);      
        // if(data == 0){   
        // }
      // },
      // "json"
    // );
    // },              
    // open: function(event, ui) {
        
      // var autocomplete = $(".ui-autocomplete:visible");
      // var oldTop = autocomplete.offset().top;
      // var newTop = oldTop - $("#Customer_nama").height() + 25;
      // autocomplete.css("top", newTop);                
    // }
  // });
  
// }
</script>