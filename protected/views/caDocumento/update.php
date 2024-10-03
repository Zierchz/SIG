<?php
$this->PPaudit('CaAuditor','LISTADO DE AUDITORES');

/* @var $this CaDocumentoController */
/* @var $model CaDocumento */
$this->myBreadCrumb("Documentos","CaDocumento","Mofificar Ca Documento");
$this->myHeader1("file","Documento");
echo $this->renderPartial('_form', array('model'=>$model)); ?>