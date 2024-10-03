<?php

class UsuarioController extends Controller
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
                'actions'=>array('create','update','modify'),
                'users'=>array('@'),
                //'roles'=>array('Administrador'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','admin1','delete','asignar'),
                'users'=>array('@'),
                //'roles'=>array('Administrador'),
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
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Usuario']))
        {
            $model->attributes=$_POST['Usuario'];            
            $sapCode = $model->username;
            $rol = $model->rol;
            $model->password = "SIG.2024";
            $passHash = password_hash($model->password, PASSWORD_BCRYPT);
            $model->password = $passHash;
            $model->bloqueado = 0;

            $trab_bdut = Yii::app()->db_bdut->createCommand()->select('t.codigo, t.nombre_apellidos, t.correo, t.departamento')->from('trabajador t')->
            where('codigo = '.$sapCode)->queryRow();

            $arrayUserName = explode('@', $trab_bdut['correo']);
            $model->username = $arrayUserName[0];
            $model->nombre = $trab_bdut['nombre_apellidos'];
            $model->sap_code = $sapCode;
            
            
            


            if($model->save()){
                $desc = "Se insertó el Usuario ".$model->username." por el usuario ";
                $this->generateLog("Inserción",$desc);
                $rol_name = Rol::model()->findByPk($rol)->getAttribute('rol');
                $model->insertAuthAssign($model->id, $rol_name);
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
                //$this->redirect(array('view','id'=>$model->id));
                //insertar la traza aqui...

        }

        $this->render('create',array(
            'model'=>$model,
            //'model_authitem'=>$model_authitem
        ));
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
        $passHash = password_hash($model->password, PASSWORD_BCRYPT);
        $model->password = $passHash;

        if(isset($_POST['Usuario']))
        {

            $model->attributes=$_POST['Usuario'];
            if($model->save()){
                $desc = "Se actualizó el Usuario ".$model->username." por el usuario ";
                $this->generateLog("Actualización",$desc);
                $this->redirect(array('view','id'=>$model->id));
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionModify($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Usuario']))
        {
            $model->attributes=$_POST['Usuario'];
            if($model->save()){
              //  $desc = "Se actualizó el Usuario ".$model->permiso." por el usuario ";
               // $this->generateLog("Actualización",$desc);
                $this->redirect('index.php?r=site/index');
            }
        }

        $this->render('modify',array(
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
        $this->loadModel($id)->delete();
		//$desc = "Se borró el Usuario ".$model->permiso." por el usuario ";
		//$this->generateLog("Borrado",$desc);

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_POST['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Usuario');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Usuario']))
            $model->attributes=$_GET['Usuario'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }
    
    public function actionAdmin1()
    {
        $model=new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Usuario']))
            $model->attributes=$_GET['Usuario'];

        $this->render('admin1',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Usuario::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuario $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
