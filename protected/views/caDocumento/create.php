<?php
$this->PPaudit('CaAuditor','LISTADO DE AUDITORES');
/* @var $this CaDocumentoController */
/* @var $model CaDocumento */
if(isset($_GET['audit']))
			$audit=$_GET['audit'];
			if(isset($_GET['audit_nombre']))
			$audit_nombre=$_GET['audit_nombre'];
$this->myBreadCrumb("Documentos","CaDocumento","Adicionar Ca Documento");
$this->myHeader1("file","Documento");
echo $this->renderPartial('_form', array('model'=>$model)); ?>