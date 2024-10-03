<?php

class CaProgramaAuditoriaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/plantilla2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
{
    $model = new CaProgramaAuditoria;
	

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['CaProgramaAuditoria']))
    {
        
        $model->attributes=$_POST['CaProgramaAuditoria'];
		$programa=CaProgramaAuditoria::model()->findByAttributes(array('anno'=>$model->anno,'unidad_rectora'=>$model->unidad_rectora));
		if($programa){
			$model->objetivos_programa=$programa->objetivos_programa;
			$model->riesgos_programa=$programa->riesgos_programa;
			$model->aprobado_por=$programa->aprobado_por;
		}
        
        $labels=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        $dates=array('f_Enero','f_Febrero','f_Marzo','f_Abril','f_Mayo','f_Junio','f_Julio','f_Agosto','f_Septiembre','f_Octubre','f_Noviembre','f_Diciembre');
        $fdates=array('fin_Enero','fin_Febrero','fin_Marzo','fin_Abril','fin_Mayo','fin_Junio','fin_Julio','fin_Agosto','fin_Septiembre','fin_Octubre','fin_Noviembre','fin_Diciembre');

        $postedData = $model->attributes;
		
                foreach ($labels as $key => $label) {
                    $fechaInicio = $model->{$dates[$key]};
                    $fechaFin = $model->{$fdates[$key]};
					$tipo = $model->{$labels[$key]};
					if(empty($tipo)==true&&empty($fechaInicio)==false||empty($tipo)==true&&empty($fechaFin)==false){
						
							Yii::app()->user->setFlash('error', 'Ha ingresado la fecha de la auditoría correspondiente al mes de '. $label .' sin especificar el tipo de auditoría');
							$model->attributes = $postedData; 
							$this->render('create',array(
								'model'=>$model,
							));
							return;
						}
                    if (!empty($fechaInicio) && !empty($fechaFin) && $this->convertirFecha($fechaInicio) > $this->convertirFecha($fechaFin)) {
                        Yii::app()->user->setFlash('error', 'La fecha de inicio de la auditoría correspondiente al mes de ' . $label . ' no puede ser posterior a la fecha límite de la misma.');
                        $model->attributes = $postedData;
                        $this->render('create',array(
                            'model'=>$model,
                        ));
                        return;
                    }
					if(!empty($fechaInicio)){
					$fecha = explode('-', $fechaInicio);
                    $annofecha = $fecha[0];
					if ($annofecha != $model->anno) {
                        Yii::app()->user->setFlash('error', 'El año de la fecha de inicio de la auditoría correspondiente al mes de ' . $label . ' debe ser igual al año del programa de auditorías.');
                        $model->attributes = $postedData; 
                        $this->render('create',array(
                            'model'=>$model,
                        ));
                        return;
                    }}
					if(!empty($fechaFin))
				{$fecha = explode('-', $fechaFin);
				$annofecha = $fecha[0];
				if ($annofecha != $model->anno) {
					Yii::app()->user->setFlash('error', 'El año de la fecha límite de la auditoría correspondiente al mes de ' . $label . ' debe ser igual al año del programa de auditorías.');
					$model->attributes = $postedData; 
					$this->render('create',array(
						'model'=>$model,
					));
					return;
				}
			}
			
                }
				
            
            
		
      
		if($model->save()) {
			for($i=0;$i<count($labels);$i++){
				if($model->{$labels[$i]}!=''){
					$auditoria=new CaAuditoria;
					$auditoria->tipo=$model->{$labels[$i]};
					$auditoria->unidad_aud=$model->unidad_a_auditar;
					$auditoria->unidad_rec=$model->unidad_rectora;
					$auditoria->programa=$model->id;
					$auditoria->Anno=$model->anno;
					$auditoria->mes=$labels[$i]    ;
					$auditoria->terminada='No';
					if($model->{$dates[$i]}!=null||$model->{$fdates[$i]}!=null){
						$auditoria->fecha_A=''.date('d-m-Y',strtotime($model->{$dates[$i]})) .' a '. date('d-m-Y',strtotime($model->{$fdates[$i]}));}
					
					$auditoria->save();}}
            $this->redirect(array('view','id'=>$model->id));
        }

    }

    // Renderizar la vista de creación con el modelo
    $this->render('create',array(
        'model'=>$model,
    ));
}


	public function convertirFecha($fecha)
	{
		// Convertir la fecha al formato 'Y-m-d'
		$fechaFormateada = date('Y-m-d', strtotime($fecha));
		
		// Eliminar los guiones y convertir la fecha a un entero
		$fechaSinGuiones = str_replace('-', '', $fechaFormateada);
		// Convertir la cadena resultante a entero
		$fechaComoEntero = intval($fechaSinGuiones);
		return $fechaComoEntero;
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaProgramaAuditoria']))
		{
			$model->attributes=$_POST['CaProgramaAuditoria'];
			$programa=CaProgramaAuditoria::model()->findByAttributes(array('anno'=>$model->anno,'unidad_rectora'=>$model->unidad_rectora));
		if($programa){
			$model->objetivos_programa=$programa->objetivos_programa;
			$model->riesgos_programa=$programa->riesgos_programa;
			$model->aprobado_por=$programa->aprobado_por;
		}
			
			$labels=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			$dates=array('f_Enero','f_Febrero','f_Marzo','f_Abril','f_Mayo','f_Junio','f_Julio','f_Agosto','f_Septiembre','f_Octubre','f_Noviembre','f_Diciembre');
			$fdates=array('fin_Enero','fin_Febrero','fin_Marzo','fin_Abril','fin_Mayo','fin_Junio','fin_Julio','fin_Agosto','fin_Septiembre','fin_Octubre','fin_Noviembre','fin_Diciembre');
			$postedData = $model->attributes;
				for($i=0;$i<count($labels);$i++){
				if($model->{$labels[$i]}!==""){
					
					$auditoria=CaAuditoria::model()->findByAttributes(array('mes' => $labels[$i],'programa'=>$model->id,));
					
					
					if($auditoria!=null){
						$auditoria->tipo=$model->{$labels[$i]};
						$auditoria->unidad_aud=$model->unidad_a_auditar;
						$auditoria->unidad_rec=$model->unidad_rectora;
						$auditoria->programa=$model->id;
						$auditoria->Anno=$model->anno;
						$auditoria->mes=$labels[$i]	;
						$auditoria->terminada='No';
						if($model->{$dates[$i]}!=null||$model->{$fdates[$i]}!=null){
							$auditoria->fecha_A=''.date('d-m-Y',strtotime($model->{$dates[$i]})) .' a '. date('d-m-Y',strtotime($model->{$fdates[$i]}));}
					

					}
					  else{
					$auditoria=new CaAuditoria;
					$auditoria->tipo=$model->{$labels[$i]};
					$auditoria->unidad_aud=$model->unidad_a_auditar;
					$auditoria->unidad_rec=$model->unidad_rectora;
					$auditoria->programa=$model->id;
					$auditoria->Anno=$model->anno;
					$auditoria->mes=$labels[$i]	;
					$auditoria->terminada='No';
					if($model->{$dates[$i]}!=null||$model->{$fdates[$i]}!=null){
					$auditoria->fecha_A=''.date('d-m-Y',strtotime($model->{$dates[$i]})) .' a '. date('d-m-Y',strtotime($model->{$fdates[$i]}));}

					}}
					
					else{ $auditoria = CaAuditoria::model()->findByAttributes(array('mes' => $labels[$i], 'programa' => $model->id));
						if ($auditoria != null) {
								// Obtener el ID de la auditoría
								$auditoriaId = $auditoria->id;
								
								// Buscar y eliminar los objetos CaPlanAuditoria asociados a la auditoría
								$planAuditorias = CaPlanAuditoria::model()->findAllByAttributes(array('auditoria' => $auditoriaId));
								if($planAuditorias!=null){
								foreach ($planAuditorias as $planAuditoria) {
									$planAuditoria->delete();
								}}
								$lists = CaListaVerificacion::model()->findAllByAttributes(array('auditoria_id' => $auditoriaId));
								if($lists!=null){
								foreach ($lists as $list) {
									$list->delete();
								}}
								$infs = CaInformeAuditoria::model()->findAllByAttributes(array('audit_id' => $auditoriaId));
								if($infs!=null){
								foreach ($infs as $inf) {
									$inf->delete();
								}}
								$evs = CaEvaluacionAuditor::model()->findAllByAttributes(array('id_plan_ev' => $auditoriaId));
								if($evs!=null){
								foreach ($evs as $ev) {
									$ev->delete();
								}}
								$eq=CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit' => $auditoriaId));
								if($eq!=null){
									foreach ($eq as $e) {
										$au=CaAuditor::model()->findByPk($e->auditor);
				                        $au->equipo_de_auditores=0;
										$au->disponibilidad=1;
										$au->es_jefe=0;
										$au->save();
										$e->delete();
									}}      
									  $auditoria->delete();

					}}
					foreach ($labels as $key => $label) {
						$fechaInicio = $model->{$dates[$key]};
						$fechaFin = $model->{$fdates[$key]};
						$tipo = $model->{$labels[$key]};
						if(empty($tipo)==true&&empty($fechaInicio)==false||empty($tipo)==true&&empty($fechaFin)==false){
						
							Yii::app()->user->setFlash('error', 'Ha ingresado la fecha de la auditoría correspondiente al mes de '. $label .' sin especificar el tipo de auditoría');
							$model->attributes = $postedData; 
							$this->render('create',array(
								'model'=>$model,
							));
							return;
						}
						if (!empty($fechaInicio) && !empty($fechaFin) && $this->convertirFecha($fechaInicio) > $this->convertirFecha($fechaFin)) {
							Yii::app()->user->setFlash('error', 'La fecha de inicio de la auditoría correspondiente al mes de ' . $label . ' no puede ser posterior a la fecha límite de la misma.');
							$model->attributes = $postedData;
							$this->render('create',array(
								'model'=>$model,
							));
							return;
						}
						if(!empty($fechaInicio)){
						$fecha = explode('-', $fechaInicio);
						$annofecha = $fecha[0];
						// var_dump($annofecha != $model->anno);die;
						if ($annofecha != $model->anno) {
							Yii::app()->user->setFlash('error', 'El año de la fecha de inicio de la auditoría correspondiente al mes de ' . $label . ' debe ser igual al año del programa de auditorías.');
							$model->attributes = $postedData; 
							$this->render('create',array(
								'model'=>$model,
							));
							return;
						}}
						if(!empty($fechaFin))
					{$fecha = explode('-', $fechaFin);
					$annofecha = $fecha[0];
					if ($annofecha != $model->anno) {
						Yii::app()->user->setFlash('error', 'El año de la fecha límite de la auditoría correspondiente al mes de ' . $label . ' debe ser igual al año del programa de auditorías.');
						$model->attributes = $postedData; 
						$this->render('create',array(
							'model'=>$model,
						));
						return;
					}}
					}
					if($auditoria!=null)$auditoria->save();
					
				}
				if($model->save()){
				$this->redirect(array('view','id'=>$model->id));}
		
	}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
{
    $programa = $this->loadModel($id);
    
    // Obtener las auditorías relacionadas al programa
    $auditorias = CaAuditoria::model()->findAllByAttributes(array('programa' => $id));
    
    // Eliminar las auditorías relacionadas al programa y sus objetos CaPlanAuditoria asociados
    foreach ($auditorias as $auditoria) {
        // Obtener el ID de la auditoría
        $auditoriaId = $auditoria->id;
        
        // Buscar y eliminar los objetos CaPlanAuditoria asociados a la auditoría
        $planAuditorias = CaPlanAuditoria::model()->findAllByAttributes(array('auditoria' => $auditoriaId));
		if($planAuditorias!=null){
        foreach ($planAuditorias as $planAuditoria) {
            $planAuditoria->delete();
        }}
		$lists = CaListaVerificacion::model()->findAllByAttributes(array('auditoria_id' => $auditoriaId));
		if($lists!=null){
        foreach ($lists as $list) {
            $list->delete();
        }}
		$infs = CaInformeAuditoria::model()->findAllByAttributes(array('audit_id' => $auditoriaId));
		if($infs!=null){
        foreach ($infs as $inf) {
            $inf->delete();
        }}
		$evs = CaEvaluacionAuditor::model()->findAllByAttributes(array('id_plan_ev' => $auditoriaId));
		if($evs!=null){
        foreach ($evs as $ev) {
            $ev->delete();
        }}
        $eq=CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit' => $auditoriaId));
		if($eq!=null){
			foreach ($eq as $e) {
				$au=CaAuditor::model()->findByPk($e->auditor);
				$au->equipo_de_auditores=0;
				$au->disponibilidad=1;
				$au->es_jefe=0;
				$au->save();
				$e->delete();
			}}      
			  $auditoria->delete();
    }
    
    // Eliminar el programa
    $programa->delete();

    // Si la solicitud es AJAX (activada por la eliminación mediante la vista de la rejilla de administración), no redirigir el navegador
    if (!isset($_GET['ajax'])) {
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaProgramaAuditoria');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaProgramaAuditoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaProgramaAuditoria']))
			$model->attributes=$_GET['CaProgramaAuditoria'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaProgramaAuditoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaProgramaAuditoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaProgramaAuditoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-programa-auditoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
}
