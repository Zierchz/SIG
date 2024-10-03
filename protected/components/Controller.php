<?php

require 'vendor/autoload.php';


/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/plantilla2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function sendMailer($user, $pass, $fullname, $subject, $message, $destiny_mail, $destiny_name)
    {
        require_once('phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ));
        $mail->SMTPSecure = "tls";
        $mail->Host = "192.168.91.10";
        $mail->Port = 25;
        $mail->Username = $user;
        $mail->Password = $pass;
        $mail->SetFrom($user, $fullname);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($destiny_mail, $destiny_name);
        if ($mail->Send()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMailerGmail($user, $pass, $fullname, $subject, $message, $destiny_mail, $destiny_name)
    {
        require_once('phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ));
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = $user;
        $mail->Password = $pass;
        $mail->SetFrom($user, $fullname);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($destiny_mail, $destiny_name);
        if ($mail->Send()) {
            return true;
        } else {
            echo "Mailer Error: " . $mail->ErrorInfo;die;
            return false;
        }
    }


    public function sendDefaultMailer($subject, $message, $destiny_mail, $destiny_name)
    {
        require_once('phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ));
        $mail->SMTPSecure = "tls";
        $mail->Host = "192.168.91.10";
        $mail->Port = 25;
        $mail->Username = "noslen.olavarieta@etecsa.cu";
        $mail->Password = "Drendal*122020";
        $mail->SetFrom("portal.ejecutivo@etecsa.cu", "Portal Empresarial");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($destiny_mail, $destiny_name);
        if ($mail->Send()) {
            return true;
        } else {
            //echo "Mailer Error: " . $mail->ErrorInfo;die;
            return $mail->ErrorInfo;;
        }
    }

    //------ Begin Plantilla 2 ---------------------------------------------------------------// 

    public function p2_PageTitle2($icon, $title, $subtitle, $modulo="", $id=""){
        $arrayUrl = explode("/", Yii::app()->urlManager->parseUrl(Yii::app()->request));
        $modelName = $arrayUrl[0];
        if(count($arrayUrl)>1)
            $currentPage = $arrayUrl[1];
        else
            $currentPage = "";
            echo '
            <div class="pagetitle row" id='.$id.' d-flex d-flex justify-content-center align-items-center" style="font-family: Bahnschrift;">
            <div class="col-md-12 d-flex d-flex justify-content-center align-items-center" ><h1 style="font-size:40px;color:black"><span class="bi bi-'.$icon.'" style="height300px;width:40px;font-size:40px;color:black" ></span> '.$title.'</h1></div>
            <nav>
            <div class="col-md-12 d-flex d-flex justify-content-center align-items-center"><ol class="breadcrumb " style="font-size:20px;text-align:center;font-family: Bahnschrift;">
            <li class="breadcrumb-item active" ><a href="'.CController::createUrl('/site/index').'" >Inicio</a></li>
                        <li class="breadcrumb-item active" >'.$modulo.'</li>                        
                        <li class="breadcrumb-item active" >'.$subtitle.'</li>
                    </ol>
                    </div>
                <div align="right">';
                
       
        echo '
                </div>
                </nav>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
        ';
    }

    
    public function p2_PageTitle($icon, $title, $subtitle, $modulo="", $id=""){
        $arrayUrl = explode("/", Yii::app()->urlManager->parseUrl(Yii::app()->request));
        $modelName = $arrayUrl[0];
        if(count($arrayUrl)>1)
            $currentPage = $arrayUrl[1];
        else
            $currentPage = "";
        echo '
            <div class="pagetitle row" id='.$id.' d-flex d-flex justify-content-center align-items-center" style="font-family: Bahnschrift;">
            <div class="col-md-12 d-flex d-flex justify-content-center align-items-center" ><h1 style="font-size:40px;color:black"><span class="bi bi-'.$icon.'" style="height300px;width:40px;font-size:40px;color:black" ></span> '.$title.'</h1></div>
            <nav>
            <div class="row">
                <div class="col-md-1"></div><div class="col-md-10 d-flex d-flex justify-content-center align-items-center" ><ol class="breadcrumb " style="font-size:20px;text-align:center;font-family: Bahnschrift;">
                    <li class="breadcrumb-item active" ><a href="'.CController::createUrl('/site/index').'" >Inicio</a></li>
                    <li class="breadcrumb-item active" >'.$modulo.'</li>                        
                    <li class="breadcrumb-item active" >'.$subtitle.'</li>
                </ol>
                </div>
                ';
        if($currentPage!=""){ 
            echo '<div class="col-md-1 d-flex d-flex justify-content-end align-items-right">';

            $currentPage = strtolower($currentPage);           
            if(strtolower($modelName)!="trazas"){
                if($currentPage=="admin"){
                    echo '
                        <a href="'.CController::createUrl('/'.$modelName.'/create').'" title="" class="btn btn-secondary custom-btn custom-tooltip" style="font-size:20px"><span class="bi bi-plus-lg " style="font-size:23px;align:right"></span><div class="custom-tooltiptextleft" style="font-size:15px">Crear</div></a>';
                }
                    
                if($currentPage=="create" || $currentPage=="update"){
                    echo '
                        <a href="'.CController::createUrl('/'.$modelName.'/admin').'" title="" class="btn btn-secondary custom-btn custom-tooltip" style="font-size:20px" onclick="return confirmAndRedirect(\''.CController::createUrl('/'.$modelName.'/admin').'\', \'¿Desea cancelar y volver al listado?\')"><span class="bi bi-list-ol" style="font-size:23px"></span><div class="custom-tooltiptextleft" style="font-size:15px">Listado</div></a>';
                }
                if($currentPage=="view"){
                    echo '
                        <a href="'.CController::createUrl('/'.$modelName.'/admin').'" title="" class="btn btn-secondary custom-btn custom-tooltip" style="font-size:20px"><span class="bi bi-list-ol" style="font-size:23px"></span><div class="custom-tooltiptextleft" style="font-size:15px">Listado</div></a>
                        ';
                       
                }
            }
            
        }
        echo '
        </div>
        </div>
                </nav>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
        ';
        echo '
        <script type="text/javascript">
        function confirmAndRedirect(url, message) {
            if (confirm(message)) {
                window.location.href = url;
            }
            return false; // Previene la acción predeterminada del enlace
        }
    </script>
    ';
    }

    public function p2_StatsCard($title, $value, $icon, $value1){
        echo '
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">                 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$title.' <span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-'.$icon.'"></i>
                            </div>
                            <div class="ps-3">
                                <h6>'.$value.'</h6>
                                <span class="text-success small pt-1 fw-bold">'.$value1.'</span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }


    public function p2_StatsCardAlert($title, $value, $icon, $value1, $url){
        echo '
            <div class="col-md-12 " >
                <div class="card card1 " >
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="index.php?r='.$url.'/Admin">Ver listado</a></li>
                    </ul>
                </div>
                    <div class="filter">                 
                    </div>
                    <div class="card-body" >
                        <h4 class="card-title" style="font-size:32px;color:#092254;font-family:Bahnschrift" > <i class="bi bi-'.$icon.'" style="font-size:52px;color:#092254">&nbsp&nbsp</i>'.$title.' <span></h5>
                        <div class="d-flex align-items-center">
                           
                            <div class="ps-3 d-flex align-items-center justify-content-center" >
                                <h1  style="font-size:50px">'.$value.'&nbsp&nbsp</h1>
                                <span class="text-secondary small pt-1 fw-bold" style="font-size:18px">'.$value1.'</span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }




    public function p2_LateralMenu(){
        $id_rol=Yii::app()->user->roleid;
        $results = Yii::app()->db->createCommand()->
            select('distinct(padre),icono')->from('permiso')->queryAll();
        /*$results = Yii::app()->db->createCommand(array(
            'select' => 'padre,icono',
            'distinct' => 'true',
            'from' => 'permiso'
        ))->queryAll();*/
        $i=0;
        $id = 0;
        foreach($results as &$padre)
        {
            $dad = $padre['padre'];
            $ico = $padre['icono'];
            $results1 = Yii::app()->db->createCommand()->
            select('p.permiso,p.modelo, p.url, p.descripcion')->from('permiso p, rol_permiso rp, rol r')->where('p.visible=0 and p.id = rp.permiso and r.id=rp.rol and p.menu="Lateral" and p.padre="'.$dad.'" and r.id="'.$id_rol.'"')->queryAll();
            if(count($results1)>0){
                $i+=1;
                $temp=0;
                foreach($results1 as &$menu)
                {
                    $url_create = CController::createUrl('/'.$menu['url'].'');
                    if($url_create==Yii::app()->request->requestUri)
                        $temp+=1;
                }
                if($temp>0){
                    $collapsed = "";
                    $expanded = "true";
                    $show = "show";
                }
                else{

                    $collapsed ="collapsed";
                    $show = "";
                    $expanded = "false";
                }
                echo '
                    <li class="nav-item">
                        <a class="nav-link '.$collapsed.'" data-bs-target="#id'.$id.'" data-bs-toggle="collapse" href="#" aria-expanded="'.$expanded.'">
                            <i class="bi '.$ico.'"></i><span>'.$dad.'</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="id'.$id.'" class="nav-content collapse '.$show.'" data-bs-parent="#sidebar-nav">
                ';    

                foreach($results1 as &$menu)
                {
                    $menu_url = $menu['url'];
                    $url_create = CController::createUrl('/'.$menu_url.'');
                    if($url_create==Yii::app()->request->requestUri)
                        echo '<li><a href="'.$url_create.'" class="active"><i class="bi bi-circle"></i><span>'.$menu['permiso'].'</span></a></li>';
                    else
                        echo '<li><a href="'.$url_create.'"><i class="bi bi-circle"></i><span>'.$menu['permiso'].'</span></a></li>';
                }
                echo '</ul></li>';
            }
            $id+=1;
        }
        if($i==0)
            echo "No tiene permisos asignados. Consulte al administrador del sistema";
    }

    

    public function p2_Notificaciones()
    {
        $notificaciones = CaNotificaciones::model()->findAllByAttributes(array('receptor' => Yii::app()->user->id));
        $cant_notificaciones = count($notificaciones);
    
       
    
        echo '<li class="nav-item d-block">
                <a class="nav-link nav-icon search-bar-toggle menu" href="#" id="openModalButton"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notificaciones" >
                    
                ';
                if ($cant_notificaciones > 0) {
                    echo '<span class="badge" style="background-color: red; font-size: 13px;">'.$cant_notificaciones.'</span>';
                }
                
                echo'
                <i class="bi bi-bell-fill" style="font-size: 27px;"></i>
                </a>
              </li>';




echo'
              
              
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header ">
                      <h2 class="modal-title" id="exampleModalLabel" style="border: 3px lightgrey dotted;border-radius:5px">&nbspNotificaciones&nbsp</h2>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size:25px"></button>
                    </div>
                    <div class="modal-body">';




                    foreach ($notificaciones as $key) {
                       
                        echo '<p>
                                <span class="'.$key->icono.'" aria-hidden="true" style="font-size: 19px;"></span> - '.$key->contenido.'';
                                if($key->tipo!="Evaluacion de Auditor por debajo de 60"){
                                    if($key->tipo!="Evaluacion de Auditor"){
                                    echo ' <div class="row d-flex d-flex justify-content-end align-items-right"><button type="button" class="btn btn-secondary text-align-center col-md-8"  onclick="return confirmAndRedirect(\''.Yii::app()->createUrl('site/eliminar_notificaciones', array('id' => $key->id, 'todas'=>'No')).'\', \'¿Estás seguro de que deseas eliminar esta notificación?\')">Borrar Notificación</button>
                                </div></p>';}}
                                echo '<hr>';
                    }
                     
                     
                         if ($notificaciones==null) {
                             echo' <p>
                         
                             No hay notificaciones para usted.
                             
                             
                             </p>';
                         }else{





                            echo '
                            <div class="row d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-danger col-md-8" style="font-size:17px;width:500px" onclick="return confirmAndRedirect(\''.Yii::app()->createUrl('site/eliminar_notificaciones', array('id' => $key->id, 'todas'=>'Si')).'\', \'En el caso de haber notificaciones que requieran su conformidad, se darán por aceptadas..¿Estás seguro de que deseas eliminar todas tus notificaciones? \')">Eliminar Todas Mis Notificaciones</button>
                            </div>
                        ';
                        
                        // Función JavaScript para mostrar la alerta de confirmación y redirigir si el usuario confirma
                       
}
                         





echo'  </div>
</div></div>
</div>';






?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Agregar un evento onclick al botón
        document.getElementById("openModalButton").addEventListener("click", function() {
            // Almacenar la URL actual en el almacenamiento local
            localStorage.setItem('previousUrl', window.location.href);

            // Abre el modal utilizando jQuery
            $("#myModal").modal("show");
        });
        
        // Agregar un evento para cuando el modal se oculta
        $("#myModal").on("hidden.bs.modal", function () {
            // Recuperar la URL almacenada
            var previousUrl = localStorage.getItem('previousUrl');

            // Redirigir a la URL almacenada al cerrar el modal
            if (previousUrl) {
                window.location.href = previousUrl;
            } else {
                // Si no hay una URL almacenada, redirigir a la página de inicio o donde desees
                window.location.href = "/"; // Cambia esto a la URL deseada
            }
        });
    });
</script>

<?php



}



    public function p2_MenuSuperior($menu, $icono, $cant="")
    {





        $id_rol=Yii::app()->user->roleid;
        $results1 = Yii::app()->db->createCommand()
            ->select('p.permiso,p.modelo, p.url, p.descripcion, p.icono')
            ->from('permiso p, rol_permiso rp, rol r')
            ->where('p.visible=0 and p.id = rp.permiso and r.id=rp.rol and p.menu="'.$menu.'" and r.id="'.$id_rol.'"')
            ->queryAll();
            $results2=array();
            if($results1){
            $results2[]=$results1[2];
            $results2[]=$results1[3];
            }
            $results3=array();
            if($results1){
            $results3[]=$results1[0];
            $results3[]=$results1[2];
            $results3[]=$results1[3];
         }
        if(count($results1)>0 && Yii::app()->user->areaid==7){
            echo '
                <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="left" title="Seguridad">
                    <a class="nav-link nav-icon d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">                                            
                            <i class="menu bi bi-'.$icono.'"></i>
                        </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            ';  
           
            if(Yii::app()->user->fullname=='Administrador'){
            foreach($results3 as &$menu)
            {                
                $url_create = CController::createUrl('/'.$menu['url'].'');
                echo '
                    <li>                        
                        <a class="dropdown-item d-flex align-items-center" href="'.$url_create.'">
                            <i class="bi bi-'.$menu['icono'].'"></i>
                            <span>'.$menu['permiso'].'</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                ';
            }
        }
        else{
            foreach($results2 as &$menu)
            {                
                $url_create = CController::createUrl('/'.$menu['url'].'');
                echo '
                    <li>                        
                        <a class="dropdown-item d-flex align-items-center" href="'.$url_create.'">
                            <i class="bi bi-'.$menu['icono'].'"></i>
                            <span>'.$menu['permiso'].'</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                ';
            }
        }
            echo '</ul></li>';
        }
        


?>
        <script>
        // Agregar un evento onclick al botón
        document.getElementById('openModalButton').addEventListener('click', function() {
            // Abre el modal utilizando jQuery
            $('#myModal').modal({ backdrop: false });
        });
    
        // Agregar un evento para cuando el modal se oculta
        $('#myModal').on('hidden.bs.modal', function () {
            // Redirigir a la URL deseada al cerrar el modal
            window.location.href = '<?=CController::createUrl("/site/eliminar_notificaciones")?>';
        });
    </script>

<?php


    }











    public function p2_MyInput($size, $form, $model, $field, $type, $properties, $list="", $width=90)
    {
        /*echo '
        <div class col-sm-'.$size.'>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        ';*/




        echo'
            <div class="col-md-'.$size.'">
                <div class="form-group">';
                echo $form->labelEx($model,$field);
                if($type=="text")
                    echo $form->textField($model,$field,$properties);
                if($type=="number")
                    echo $form->numberField($model,$field,$properties);
                if($type=="password")
                    echo $form->passwordField($model,$field,$properties);
                if($type=="select")
                    echo $form->dropDownList($model,$field, $list,$properties);
                if($type=="file")
                    echo CHtml::activeFileField($model, $field, $properties);
                if($type=="date")
                    echo CHtml::activeDateField($model,$field,$properties);
                if($type=="textArea")
                    echo CHtml::activeTextArea($model,$field,$properties);
                if($type=="multiFile")
                    return $this->widget('CMultiFileUpload',
                        array(
                            'id'=>'docs',
                            'model'=>$model,
                            'name'=>'docs',
                            'attribute' => 'nombre',
                            'accept'=>'jpg|gif|png|doc|docx|pdf',
                            'denied'=>'Only doc,docx,pdf and txt are allowed', 
                            'max'=>4,
                            'remove'=>'[x]',
                            'duplicate'=>'Already Selected',
                            'htmlOptions' => array('multiple' => 'multiple')
                        )
                    );
                if ($type=="selectWithText") {
                    $inputID = get_class($model) . '_' . $field;
                    $dropProperties = array_merge($properties, array('id'=>'drop_id', 'onchange'=>"document.getElementById('".$inputID."').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;"));
                    echo $form->dropDownList($model,$field, $list,$dropProperties);
                    
                    $inputProperties = array('placeholder'=>"Seleccione o escriba un valor", 'size'=>60,'maxlength'=>150, 'class'=>'form-control', 'style'=>'position: absolute; top:25px; width: '. $width .'%; border-right:0');
                    echo $form->textField($model,$field,$inputProperties);
                    echo '<input name="idValue" id="idValue" type="hidden" value="">';
                }
                if($form!="")
                    echo $form->error($model,$field);
                    echo '</div></div>';
    }

    //------ End Plantilla 2 ---------------------------------------------------------------// 



// funciones antiguas de calidad



public function myFlashMessage(){
    foreach(Yii::app()->user->getFlashes() as $key =>$message)
{
	echo '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Error!</strong> '.$message.'
  </div>';
} 
    
}

public function myFlashMessage1(){
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo ' <div class="col-lg-12" ><div class="flash-' . $key . '">
            <div class="errorMessage" id="LoginForm_password_em_" >
                <div class="alert alert-success alert-dismissable" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4>  <i   class="fa fa- fa-fw"></i>'.
                    $message.
                '</h4></div> 
            </div>
        </div>
        </div>';

    }

}




public function PPaudit($url,$filtro,$valor,$texto){
    echo  '
<div class="row " >
  <div style="width:1px"></div><div class="col-md-4 btn btn-secondary return" style="padding-bottom:0px;border-radius: 15px;text-align:center"><a style="text-align: center" href=" '.CController::createUrl("/$url/Admin",array("$filtro"=>$valor)).' "><h5 style="color: white;text-align:center;font-family:Bahnschrift;font-size:19px"><span  style="color: white;" class="bi bi-arrow-counterclockwise"></span>  '.$texto.'</h5></a>

  </div>

</div>';
  }

  public function myBreadCrumb_calidad($model = "", $page = "")
  {
      //$access = new AccessControlController(1);
      //$access->actionRefresh();
      $url_index = CController::createUrl('//caAuditoria/admin');
      $url_sen = CController::createUrl('//caProgramaAuditoria/admin');
      $url_page = CController::createUrl('//caRevisionDireccion/admin');
      
      echo '<div class="row">
              <div  class="col-xs-12">
                  <ol>
                      <h1></h1>
                      <h3><li class="col-lg-3 " style="height:40px;background-color:#092254;border-radius: 50px;text-align:center;border-left: 13px double white;border-right: 13px double white;border-top: 1px solid #092254;border-top: 1px solid #092254"><a class="btn" style="color: white" href="' . $url_sen . '">  <span class="glyphicon glyphicon-share-alt"></span>  PROGRAMA ANUAL DE AUDITORÍAS   </a></li></h3>
                      <li class="col-xs-1" style="text-align:center;"><h4> </h4></li>
                      <h3   ><li class="col-lg-3 " style="height:40px;background-color:#092254;border-radius: 50px;text-align:center;border-left: 13px double white;border-right: 13px double white;border-top: 1px solid #092254;border-bottom: 1px solid #092254"><a class="btn" style="color: white" href="' . $url_index . '"> <span class="glyphicon glyphicon-share-alt"></span>  AUDITORÍAS  </a></li></h3>
                      <li class="col-xs-1" style="text-align:center;"><h4>  </h4></li>
                      <h3><li class="col-lg-4 " style="height:40px;background-color:#092254;border-radius: 50px;text-align:center;border-left: 13px double white;border-right: 13px double white;border-top: 1px solid #092254;border-top: 1px solid #092254"><a class="btn" style="color: white" href="' . $url_page . '">  <span class="glyphicon glyphicon-share-alt"></span>  PROGRAMA ANUAL DE LA REVISIÓN POR LA DIRECCIÓN</a></li></h3>
      </div>';
                     
      echo '</ol>
              </div>
            </div>';
  }















// final de funciones antguas de calidad






    public function myBreadCrumb($admin, $model="",$page=""){
        //$access = new AccessControlController(1);
        //$access->actionRefresh();
        $url_index = CController::createUrl('//site/index');
        $url_model = CController::createUrl('//'.$model.'/Admin');
        echo '<div class="row">
                <div id="breadcrumb" class="col-xs-12">
                    <ol class="breadcrumb">
		                <h1></h1>
                        <li><a href="'.$url_index.'">Inicio</a></li>';
        if(!$model=="")
        {
            //if($model=="Reporte")
            //	echo '<li><a href="#">'.$model.'s</a></li>';
            //else
			if(($admin=="Mi perfil" && Yii::app()->user->usergroup==4) or ( $admin!="Noticias"))
				echo '<li><a href="'.$url_model.'">'.$admin.'</a></li>';
			else
				echo '<li><a>'.$admin.'</a></li>';
            echo '<li><a href="#">'.$page.'</a></li>';
        }
        else
            echo '<li><a href="#">'.$page.'</a></li>';
        echo            '</ol>
                </div>
              </div>';
    }
	
	public function myModal($id21,$row){
		$data_meta= array();
		$Ventas=array();
		$Fechas=array();
		$Planes=array();		
		//--------Modal Header---------------------------------------------------------------------
		$nombre = $row['nombre'];
		echo '
			<div class="modal fade" id="2'.$id21.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
				<div class="modal-dialog" style="width: 650px;">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel" align="left"><b>Aval de la aplicación:</b> '.$nombre.'</h4>
						</div>
						<div class="modal-body" align="left">';
		//--------Modal Content---------------------------------------------------------------------
		echo '<b>Categoría:</b> '.$row['tipo'].'&nbsp;|&nbsp;<b>Periodo:</b> '.$row['mes'].'/'.$row['anno'].'&nbsp;|&nbsp;<b>U/M:</b> '.$um.'<br/>';
		if(Yii::app()->user->roleid==1)
		{
			echo '<b>Real Año Anterior:</b> <input size="7" id="acum'.$id21.'" type="text" value="'.$acum.'"/>&nbsp;|&nbsp;
				  <b>Real:</b> <input size="7"  id="real'.$id21.'" type="text" value="'.$real.'"/>&nbsp;|&nbsp;
				  <b>Plan:</b> <input size="7"  id="plan'.$id21.'" type="text" value="'.$plan.'"/>
				  <b>Plan Mensual:</b> <input size="7"  id="planM'.$id21.'" type="text" value="'.$plan_mensual.'"/>';
		}
		else
			echo '<b>Real Año Anterior:</b> '.$acum.' &nbsp;|&nbsp;<b>Real:</b> '.$real.' &nbsp;|&nbsp;<b>Plan:</b> '.$plan.' &nbsp;|&nbsp;<b>Plan Mensual:</b> '.$plan_mensual;						
		
		echo '<br/><b>Observaciones:</b><br/>';
		if(Yii::app()->user->roleid==1)
		{
			echo '<textarea cols="73" rows="7" id="observacion'.$id21.'">'.$row['valoracion'].'</textarea><br/><br/>
				  <input id="id'.$id21.'" type="hidden" value="'.$id21.'"/>
				  <button type="button" onclick="sendInfo()" class="btn btn-default" data-dismiss="modal">Guardar</button> ';
		}
		else
		{
			echo '<p>'.$row['valoracion'].'</p>';
		}		
		//--------Modal Footer---------------------------------------------------------------------
		echo '</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>';
	}

    public function myHeader1($header){
        echo '
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">'.$header.'</h1>
                </div>
            </div>
        ';
    }
	
	public function getListTreeView() {
        if (empty(self::$catTree)) {
            self::getMenuTree();
        }
        return self::visualTree(self::$catTree, 0);
	}
	
	public static function getMenuTree() {
        if (empty(self::$menuTree)) {
            $rows = CategoriaDocumento::model()->findAll('parent IS NULL');
            foreach ($rows as $item) {
                self::$menuTree[] = getMenuItems($item);
            }
        }
        return self::$menuTree;
	}
	
	private static function getMenuItems($modelRow) {
 
        if (!$modelRow)
            return;
 
        if (isset($modelRow->Childs)) {
            $chump = self::getMenuItems($modelRow->Childs);
            if ($chump != null)
                $res = array('label' => $modelRow->categoria, 'items' => $chump, 'url' => Yii::app()->createUrl('CategoriaDocumento/youraction', array('id' => $modelRow->id)));
            else
                $res = array('label' => $modelRow->categoria, 'url' => Yii::app()->createUrl('CategoriaDocumento/youraction', array('id' => $modelRow->id)));
            return $res;
        } else {
            if (is_array($modelRow)) {
                $arr = array();
                foreach ($modelRow as $leaves) {
                    $arr[] = self::getMenuItems($leaves);
                }
                return $arr;
            } else {
                return array('label' => ($modelRow->categoria), 'url' => Yii::app()->createUrl('CategoriaDocumento/youraction', array('id' => $modelRow->id)));
            }
        }
    }
 
	private static function visualTree($catTree, $level) {
        $res = array();
        foreach ($catTree as $item) {
            $res[$item['id']] = '' . str_pad('', $level * 2, '-') . ' ' . $item['label'];
            if (isset($item['items'])) {
                $res_iter = self::visualTree($item['items'], $level + 1);
                foreach ($res_iter as $key => $val) {
                    $res[$key] = $val;
                }
            }
        }
        return $res;
    }


    public function myTableHeader1($icon, $name, $tableHeader, $currentPage="", $model='', $modelid=""){
        //-- $name: nombre a mostrar en los menu
        //-- $tableHeader: Encabezado de la tabla
        //--$currentPage: pagina actual

        echo '
            <div class="row" style="margin-right: 0px;margin-left: 0px;">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-'.$icon.' fa-fw"></i> '.$tableHeader;
        if($currentPage!="")
        {
            echo '<div class="pull-right">';
            echo '<div class="btn-group">';
            echo '<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">';
            echo '<i class="fa fa-gear fa-fw"></i>';
            echo '<span class="caret"></span>';
            echo '</button>';
            echo '<ul class="dropdown-menu pull-right" role="menu">';
            if($currentPage=="Admin"){
                echo '<li><a href="'.Yii::app()->createUrl($model.'/Create').'">Crear '.$name.'</a></li>';
                if($model=="Icm" || $model=="Incidencias"|| $model=="Medio")
                    echo '<li><a href="'.Yii::app()->createUrl($model.'/Excel').'">Exportar Excel</a></li>';
            }
            if($currentPage=="Create")
                echo '<li><a href="'.Yii::app()->createUrl($model.'/Admin').'">Listado de '.$name.'</a></li>';
            if($currentPage=="Update")
            {
                echo '<li><a href="index.php?r='.$model.'/Admin">Listado de '.$name.'</a></li>';
                echo '<li><a href="'.Yii::app()->createUrl($model.'/Create').'">Crear '.$name.'</a></li>';
                echo '<li><a href="index.php?r='.$model.'/view&id='.$modelid.'">Visualizar '.$name.'</a></li>';
            }
            if($currentPage=="View")
            {
                echo '<li><a href="index.php?r='.$model.'/Admin">Listado de '.$name.'</a></li>';
                echo '<li><a href="'.Yii::app()->createUrl($model.'/Create').'">Crear '.$name.'</a></li>';
                echo '<li><a href="index.php?r='.$model.'/update&id='.$modelid.'">Actualizar '.$name.'</a></li>';
                if($model=="Aplicacion")
                    echo '<li><a href="'.Yii::app()->createUrl($model.'/Excel&idApp='.$modelid).'">Exportar Excel</a></li>';
            }
            if($currentPage=="Report")
            {
                echo '<li><a href="index.php?r='.$model.'/PDF">Generar PDF</a></li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
        }
        echo '
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
        ';
    }
	
	public function myInput1($size, $form, $model, $field, $type, $properties, $list="")
	{
		echo'
		<div class="col-lg-'.$size.'">
			<div class="form-group">';
				echo $form->labelEx($model,$field);
				if($type=="text")
					echo $form->textField($model,$field,$properties);
				if($type=="number")
					echo $form->numberField($model,$field,$properties);
				if($type=="password")
					echo $form->passwordField($model,$field,$properties);
				if($type=="select")
					echo $form->dropDownList($model,$field, $list,$properties);
				if($type=="file")
					echo CHtml::activeFileField($model, $field, $properties);
				if($form!="")
                    echo $form->error($model,$field);
		echo '</div>
		</div>
		';
	}

    public function myInput($size, $form, $model, $field, $type, $properties, $list="", $width=90)
    {
        echo'
            <div class="col-lg-'.$size.'">
                <div class="form-group">';
                echo $form->labelEx($model,$field);
                if($type=="text")
                    echo $form->textField($model,$field,$properties);
                if($type=="number")
                    echo $form->numberField($model,$field,$properties);
                if($type=="password")
                    echo $form->passwordField($model,$field,$properties);
                if($type=="select")
                    echo $form->dropDownList($model,$field, $list,$properties);
                if($type=="file")
                    echo CHtml::activeFileField($model, $field, $properties);
                if($type=="date")
                    echo CHtml::activeDateField($model,$field,$properties);
                if($type=="textArea")
                    echo CHtml::activeTextArea($model,$field,$properties);
                if($type=="multiFile")
                    return $this->widget('CMultiFileUpload',
                        array(
                            'id'=>'docs',
                            'model'=>$model,
                            'name'=>'docs',
                            'attribute' => 'nombre',
                            'accept'=>'jpg|gif|png|doc|docx|pdf',
                            'denied'=>'Only doc,docx,pdf and txt are allowed', 
                            'max'=>4,
                            'remove'=>'[x]',
                            'duplicate'=>'Already Selected',
                            'htmlOptions' => array('multiple' => 'multiple')
                        )
                    );
                if ($type=="selectWithText") {
                    $inputID = get_class($model) . '_' . $field;
                    $dropProperties = array_merge($properties, array('id'=>'drop_id', 'onchange'=>"document.getElementById('".$inputID."').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;"));
                    echo $form->dropDownList($model,$field, $list,$dropProperties);
                    
                    $inputProperties = array('placeholder'=>"Seleccione o escriba un valor", 'size'=>60,'maxlength'=>150, 'class'=>'form-control', 'style'=>'position: absolute; top:25px; width: '. $width .'%; border-right:0');
                    echo $form->textField($model,$field,$inputProperties);
                    echo '<input name="idValue" id="idValue" type="hidden" value="">';
                }
                if($form!="")
                    echo $form->error($model,$field);
                    echo '</div></div>';
    }

	
	
	public function myButton($model)
	{
		if($model->getIsNewRecord()==false)
			$text = "Actualizar";
		else
			$text = "Insertar";
		echo '
		<div class="col-lg-12">
		<div class="form-group" align="right">
			<button name="yt0" id="yt0" type="submit" class="btn btn-secondary custom-btn" style="width:200px;height:50px;font-size:21px;">'.$text.'</button>
		</div>
		</div>
		';
	}
	
	public function myDatepicker($size, $form, $model, $field)
	{
		$modelname=get_class($model);
		echo '<div class="col-lg-'.$size.'">';
			echo '<div class="form-group">';
				echo $form->labelEx($model,$field);
					echo '<div class="form-group">';
						echo '<div class="input-group" id="sandbox-container">';
						if($model->getIsNewRecord()==false){
							$val = $model->$field;
							echo '<input name="'.$modelname.'['.$field.']" id="'.$modelname.'_'.$field.'" class="form-control" value="'.$val.'" type="text"/>';
						}else{
							echo '<input name="'.$modelname.'['.$field.']" id="'.$modelname.'_'.$field.'" class="form-control" type="text"/>';
						}
						echo '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>';
					echo '</div>';
				echo '</div>';
				echo $form->error($model,$field);
			echo '</div>';
		echo '</div>';
	}

    public function generateLog($evento,$desc1="")
    {
        $ip_address = "";
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '')
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
            if($ip_address=="::1")
                $ip_address="127.0.0.1";
        }
        
        $ip = $ip_address;
        //$ip = Yii::app()->user->ip;
        $username = Yii::app()->user->name;
        $fechaactual=date("Y-m-d H:i:s");
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $desc = $fechaactual.": ".$desc1.$username." desde el ip ".$ip." ";
        $log=new Trazas();
        $log->attributes = array("ip"=>$ip,"usuario"=>$username,"fecha"=>$fecha, "hora"=>$hora,"evento"=>$evento,"resumen"=>$desc);
        $log->save();
    }

    public function Menu_Superior($menu, $icono)
    {
        $id_rol=Yii::app()->user->roleid;
        $results1 = Yii::app()->db->createCommand()
            ->select('p.permiso,p.modelo, p.url, p.descripcion, p.icono')
            ->from('permiso p, rol_permiso rp, rol r')
            ->where('p.visible=0 and p.id = rp.permiso and r.id=rp.rol and p.menu="'.$menu.'" and r.id="'.$id_rol.'"')
            ->queryAll();
        if(count($results1)>0){
            echo '
            <li class="dropdown">
                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                    <i class="fa fa-'.$icono.'" style="color: #7BC5D3;"></i> <span style="color: #7BC5D3; line-height: 42px;"></span>
                    <i class="fa fa-angle-down pull-right"></i>
                </a>
                <ul class="dropdown-menu">';
            foreach($results1 as &$menu)
            {
                if($menu['url']=="Personal/View")
                    $menu['url']=$menu['url']."&id=1";
                $url_create = CController::createUrl('/'.$menu['url'].'');
                
                echo '<li>
                    <a href="'.$url_create.'">
                        <i class="fa '.$menu['icono'].'" style="color: #7BC5D3"></i>
                        <span style="color: white">'.$menu['permiso'].'</span>
                    </a>
                </li>';
            }
            echo '</ul></li>';
        }
    }

    public function lateralMenu(){

        echo '
            <li>
                <a href="'.CController::createUrl('/site/index').'">
                    <i class="fa fa-home"></i>
                    <span class="hidden-xs">Inicio</span>
                </a>
            </li>
        ';
        $id_rol=Yii::app()->user->roleid;
        $results = Yii::app()->db->createCommand(array(
            'select' => 'padre,icono',
            'distinct' => 'true',
            'from' => 'permiso'
        ))->queryAll();
        $i=0;
        foreach($results as &$padre)
        {

            $dad = $padre['padre'];
            $ico = $padre['icono'];
            //echo var_dump($padre);
            $results1 = Yii::app()->db->createCommand()->
            select('p.permiso,p.modelo, p.url, p.descripcion')->from('permiso p, rol_permiso rp, rol r')->where('p.visible=0 and p.id = rp.permiso and r.id=rp.rol and p.menu="Lateral" and p.padre="'.$dad.'" and r.id="'.$id_rol.'"')->queryAll();
            if(count($results1)>0){
                $i+=1;
                $temp=0;
                foreach($results1 as &$menu)
                {
                    $url_create = CController::createUrl('/'.$menu['url'].'');
                    if($url_create==Yii::app()->request->requestUri)
                        $temp+=1;
                }
                if($temp>0){

                    $active = "active-parent active";
                    $style = 'style="display: block;"';
                }
                else{

                    $active ="";
                    $style = "";
                }
                echo '
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle '.$active.'">
                        <i class="fa '.$ico.'"></i>
                        <span class="hidden-xs">'.$dad.'</span>
                    </a>
                    <ul class="dropdown-menu" '.$style.'>';
                foreach($results1 as &$menu)
                {
                    if($menu['permiso']=="Plan de Trabajo Individual")
                        $menu_url = "Site/ReportInd";
                    elseif($menu['permiso']=="Plan de Trabajo Colectivo")
                        $menu_url = "Site/ReportCol";
                    elseif($menu['permiso']=="Plan de Trabajo Dirección")
                        $menu_url = "Site/ReportDir";
                    elseif($menu['permiso']=="Informe Cump. Individual")
                        $menu_url = "Site/ReportIcm";
                    elseif($menu['permiso']=="Informe Cump. Colectivo")
                        $menu_url = "Site/ReportIcmc";
                    else
                        $menu_url = $menu['url'];
                    $url_create = CController::createUrl('/'.$menu_url.'');
                    
                    if($url_create==Yii::app()->request->requestUri)
                        echo '<li><a href="'.$url_create.'" class="active-parent active">'.$menu['permiso'].'</a></li>';
                    else
                        echo '<li><a href="'.$url_create.'">'.$menu['permiso'].'</a></li>';
                }
                echo '</ul></li>';
            }
        }
        if($i==0)
            echo "No tiene permisos asignados. Consulte al administrador del sistema";
    }

    public function checkRole($nombre, $type=""){
        //echo $nombre;die;
        $id_rol = Yii::app()->user->roleid;
        if($type=="")
        {
            $permiso = Permiso::model()->findByAttributes(array('url'=>$nombre));
            if(isset($permiso)){
                $id_permiso = $permiso->id;
            }
        }
        else
        {
            $id_permiso = $nombre;
        }
        if(isset($id_permiso)){
            if(!RolPermiso::model()->exists('permiso='.$id_permiso.' AND rol='.$id_rol.''))
                return false;
            else
                return true;
        } else {
            return false;
        }

    }

    protected function beforeAction($action)
    {
        // almacenar valores sin mayusculas-----------------------------------
        $urlExcluidas = array('site/login', 'site/index', 'site/logout', 'site/report', 'site/error','aplicacion/excel', 'appcontacto/borrar','site/nomencladores');
        $urlExcluidas1 = array('site/index', 'trazas/admin', 'site/home', 'site/logout','site/login','site/report', 'site/error','site/nomencladores');
        $url = strtolower($action->controller->id . "/" . $action->id);
        //echo $url;die;
        if (!in_array($url, $urlExcluidas1)){
            $desc = "Se accedió a ".$url." por el usuario ";
            $this->generateLog("Acceso",$desc);
        }
        //var_dump($url);die;
        if (!in_array($url, $urlExcluidas)){
            if (!$this->checkRole($url)) {
                Yii::app()->user->setFlash('sinPermiso', "<i class='fa fa-warning fa-fw'></i> No tiene permisos para acceder a esa funcionalidad.");
                $this->redirect(array('site/index'));
            }
        } 
        return parent::beforeAction($action);
    }

    public function clean($s) {
        //$s = mb_convert_encoding($s, 'utf-8','');
        $s = preg_replace("/á|à|â|ã|ª/","a",$s);
        $s = preg_replace("/Á|À|Â|Ã/","A",$s);
        $s = preg_replace("/é|è|ê/","e",$s);
        $s = preg_replace("/É|È|Ê/","E",$s);
        $s = preg_replace("/í|ì|î/","i",$s);
        $s = preg_replace("/Í|Ì|Î/","I",$s);
        $s = preg_replace("/ó|ò|ô|õ|º/","o",$s);
        $s = preg_replace("/Ó|Ò|Ô|Õ/","O",$s);
        $s = preg_replace("/ú|ù|û/","u",$s);
        $s = preg_replace("/Ú|Ù|Û/","U",$s);
        $s = str_replace(" ","_",$s);
        $s = str_replace("ñ","n",$s);
        $s = str_replace("Ñ","N",$s);
        $s = preg_replace('/[^a-zA-Z0-9_.-]/', '', $s);
        //echo var_dump($s);die;
        return $s;
    }

    public function Gridview($model, $array_params){
        $array = array(
            array('header'=>'No.',
                'value'=>'++$row',
                'htmlOptions' => array ('style' => 'text-align: center;' ),
            ),
        );
        foreach($array_params as &$param)
            array_push($array,$param);
        //var_dump($array);die;
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'trabajador-grid',
            'dataProvider'=>$model,
            'summaryText'=>'Mostrando {start} a {end} de {count} resultados',
            'pager'=>array(
                'header'=>'Ir a la pagina:',
                'firstPageLabel'=>'< <',
                'prevPageLabel'=>'Anterior',
                'nextPageLabel'=>'Siguiente',
                'lastPageLabel'=>'>>;'
            ),
            'columns'=>$array
        ));
    }

    public function getDetailView($array_headers, $array_fields, $sql, $model, $id){        
        $c=1;
        $table="<table class='table table-striped table-bordered' style='width:0%; background:unset'><thead><tr class='odd'>";
        foreach($array_headers as &$header){
             $table.= "<th>".$header."</th>";
        }
        $table.= "</tr></thead><tbody>";
        $ing = Yii::app()->db->createCommand($sql)->queryAll();
        if(count($ing)>0){
            $text="";            
            foreach($ing as &$row)
            {
                $table.= "<tr class='odd'>";
                $table.= "<td>".$c."</td>";
                for($i=0;$i<count($array_fields);$i++) {
                    if($array_fields[$i]!="id"){
                        $table.="<td>".$row["".$array_fields[$i]]."</td>";                            
                    }
                }
                $table.= "</tr>";
                $c+=1;
            }
        }
        $table.= "</tbody</table>";  
        $table.="<a href='index.php?r=".$model."/Admin1&id_app=".$id."'><i class='fa fa-pencil'></i> Editar</a><br/>";     
        return  $table;
    }

}