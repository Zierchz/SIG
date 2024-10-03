<!-- Bootstrap DataTable -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dataTables.bootstrap.min.css">
<!-- Bootstrap ExportDataTable -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/buttons.bootstrap.min.css">

<!-- Font icons -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css">



<!-- jQuery -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>

<!-- DataTables JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dataTables.bootstrap.min.js"></script>
<!-- ExportDataTable JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/popper.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jszip.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pdfmake.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vfs_fonts.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/buttons.html5.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/buttons.print.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/buttons.colVis.min.js"></script>

<!-- Bootstrap JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

<style>




    table.dataTable.export-pdf th,
    table.dataTable.export-pdf td {
        text-align: center !important;
    }

    table.dataTable.export-pdf thead th {
        text-align: center !important;
    }

  
    

    .select2-container--default .select2-results > .select2-results__options {
        max-height: 200px;
        overflow-y: auto;
        width: 400px;
        background: white;
    }

    /* Aquí se aplican tus estilos CSS personalizados existentes */
    .select2-container--default .select2-selection--single {
        height: 30px;
        font-family: inherit;
        font-size: 12px;
    }   


    .select2-container--default .select2-selection--single {
        height: 30px;
        font-family: inherit;
        font-size: 12px;
    }

    .select2-container--default .select2-results > .select2-results__options {
        max-height: 200px;
        overflow-y: auto;
        width: 400px;
        background: white;
    }

    .select2-search--dropdown {
        width: 400px;
    }

    .select2-container--open .select2-dropdown--below {
        border: none;
    }

    .table.dataTable > thead th {
        color: white;
        background: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/139d26f/gridview/bg.gif) repeat-x scroll left top white;
        text-align: center;
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #E5F1F4;
    }

    .table-striped > tbody > tr:nth-of-type(even) {
        background-color: #F8F8F8;
    }

    .table-striped > tbody > tr:hover {
        background-color: #ecfbd4;
    }

    .table-striped > tbody > tr:active {
        background-color: #bce774;
    }

    .table-bordered {
        border-color: white;
    }

    .buttons-copy,
    .buttons-excel,
    .buttons-pdf,
    .buttons-print,
    .buttons-csv,
    .buttons-colvis {
        background-color: #337ab7;
        color: white;
    }

    .buttons-copy:hover,
    .buttons-excel:hover,
    .buttons-pdf:hover,
    .buttons-print:hover,
    .buttons-csv:hover,
    .buttons-colvis:hover {
        background-color: #204d74;
        color: white;
    }

    .col-sm-6 {
        width: 50%;
        text-align: left;
    }

    .dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
        text-align: left;
    }

    .badge {
        background: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/139d26f/gridview/bg.gif) repeat-x scroll left top white;
    }

    tr {
        text-align: center;
    }

    .pagination > li:first-child > a,
    .pagination > li:first-child > span,
    .pagination > li:last-child > a,
    .pagination > li:last-child > span,
    .pagination > li > a {
        border-radius: 15px;
        font-size: 11px;
        border: solid 1px #9aafe5;
        color: #0e509e;
        padding: 1px 6px;
        text-decoration: none;
        background-color: #fff;
    }

    .nav-tabs > li.active > a,
    .nav-tabs > li.active > a:focus,
    .nav-tabs > li.active > a:hover,
    .nav-tabs > li > a:hover {
        background: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/139d26f/gridview/bg.gif) repeat-x scroll left top white;
        color: white;
        border-left-color: #204d74;
        border-top-color: #204d74;
        border-right-color: #204d74;
    }

    .nav-tabs {
        border-bottom: 1px solid #204d74;
        width: 226px;
    }

    tfoot {
        background: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/139d26f/gridview/bg.gif) repeat-x scroll left top white;
        color: white;
    }

    .table-bordered > tfoot > tr > th {
        border: 0px;
    }

    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover,
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover {
        color: #0e509e;
        background-color: transparent;
    }

    .table-bordered > tbody > tr > td,
    .table-bordered > tbody > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > thead > tr > th {
        border: 1px solid white;
    }
    table.dataTable.export-pdf th,
    table.dataTable.export-pdf td,
    table.dataTable.export th,
    table.dataTable.export td {
        text-align: center !important;
    }
</style>

<?php
/* @var $this SenDisciplinaInfSienController */
/* @var $model SenDisciplinaInfSien */

$a = $area = Yii::app()->user->areaid;
$filtro = "";
if (Yii::app()->user->roleid == 1) {
    $filtro = null;
} else {
    $filtro = $a;
}






$model = new CaAuditoria();

// El resto del código de la vista

$this->myBreadCrumb_calidad(" Auditorías","CaAuditoria","Listado de Ca Auditorias");
$this->myHeader1("search","Auditorías");
$this->myTableHeader2("Listado de Auditorías", "Admin","CaAuditoria","");

$dataProvider = $model->search();





$columns = [
    ['header' => 'No.', 'value' => '$row'],
    ['header' => 'Año', 'value' => '$data->Anno'],
    
    // ['header' => 'Anno', 'value' => 'UnidadOrganizativa::model()->findByAttributes(array("id"=>$data->id_uo))->siglas'],
    ['header' => 'Mes', 'value' => '$data->mes'],
    ['header' => 'Unidad Rectora', 'value' => '$data->idUnidadRectora1->siglas'],
    ['header' => 'Unidad Auditada', 'value' => '$data->idUnidadAAuditar1->siglas'],
    ['header' => 'Tipo de Auditoria', 'value' => '$data->tipo'],
    ['header' => 'Observaciones', 'value' => '$data->observaciones'],
];

// Generar el código HTML del DataTable
$html = '<table id="sen-disciplina-inf-sien-grid" class="table table-striped table-bordered">';
$html .= '<thead>';
$html .= '<tr>';
foreach ($columns as $column) {
    $html .= '<th>' . $column['header'] . '</th>';
}
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
$row = 1; // Inicializar la numeración de filas
foreach ($dataProvider->getData() as $data) {
    $html .= '<tr>';
    foreach ($columns as $column) {
        if ($column['header'] == 'No.') {
            $html .= '<td>' . $row . '</td>';
        } else {
            $html .= '<td>' . eval('return ' . $column['value'] . ';') . '</td>';
        }
    }
    $html .= '</tr>';
    $row++; // Incrementar el número de fila
}
$html .= '</tbody>';
$html .= '</table>';

echo $html;
?>






<script>
$(document).ready(function() {
    var table = $('#sen-disciplina-inf-sien-grid').DataTable({
        dom: 'Bfrtip', // Agrega los botones
        buttons: [
            {
                extend: 'copy',
                text: 'Copiar',
                className: 'buttons-copy', // Agregar la clase CSS
                attr: {
                    id: 'copy-button' // Agregar un ID si es necesario
                },
                title: 'Auditorías' // Cambia el nombre del documento para Copiar
            },
            {
                extend: 'excel',
                text: 'Excel',
                className: 'buttons-excel', // Agregar la clase CSS
                attr: {
                    id: 'excel-button' // Agregar un ID si es necesario
                },
                title: 'Auditorías' // Cambia el nombre del documento para Excel
            },
            // {
            //     extend: 'pdf',
            //     text: 'PDF',
            //     className: 'buttons-pdf', // Agregar la clase CSS
            //     attr: {
            //         id: 'pdf-button' // Agregar un ID si es necesario
            //     },
            //     title: 'Auditorías' // Cambia el nombre del documento para PDF
            // },
           
            {
                extend: 'colvis',
                text: 'Visibilidad de columnas',
                className: 'buttons-colvis', // Agregar la clase CSS
                attr: {
                    id: 'colvis-button' // Agregar un ID si es necesario
                }
            }
        ]
    });

    table.buttons().container()
        .appendTo('#sen-disciplina-inf-sien-grid_wrapper .col-sm-6:eq(0)');
});

</script>

