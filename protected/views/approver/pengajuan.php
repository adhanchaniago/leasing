<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposal-grid',
	'dataProvider'=>$modeldata->searchPengajuan(),
	'columns'=>array(
		array(
			'header' => 'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
				'name'=>'cust.nama',
				'type'=>'raw',
				'value'=>'$data->getLink()',
				),
		'cust.penghasilan',
		'kendaraan.kendaraan',
		'judul_pengajuan',
		array(
			'header'=>'Jangka Waktu',
			'value'=>'$data->getJangka()',
		),
		'status.status',
		array(
			'header'=>'Action',
			'headerHtmlOptions'=>array('style'=>'text-align:center;'),
			'class' => 'CButtonColumn',
			'htmlOptions'=>array('style'=>'text-align:center;'),
			'template' => '{approve}{reject} ',
			'buttons' => array
				(
					'approve' => array
					(
						'label' => '<i class="fa fa-check-square"></i>',
						'imageUrl'=> false,
						'options' => array('title' => 'Approved', 'style' => 'text-decoration:none;color:#00CC00;padding-right:10px;'),
						'url' => 'Yii::app()->createUrl("/approver/approved", array("id" => $data->id))',
						// 'visible' => '$data->status_id==""&&$data->nomor_pertandingan!=""',
					),
					'reject' => array
					(
						'label' => '<i class="fa fa-remove"></i>',
						'imageUrl'=> false,
						'options' => array('title' => 'Rejected', 'style' => 'text-decoration:none;color:#FF0000;'),
						'url' => 'Yii::app()->createUrl("/approver/rejected", array("id" => $data->id))',
						// 'visible' => '$data->status_id==""&&$data->nomor_pertandingan!=""'
					),
                        
                        
				)
                        
                        
			),
	),
)); ?>