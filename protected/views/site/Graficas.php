<?=$this->p2_PageTitle("file-bar-graph","Gráficas del sistema", "", "Gráficas");?>

<div class="row">
<div class="card" style="width: 18rem;margin-left:10%">
  <img src="./img/cm.png" class="card-img-top">
  <div class="card-body">
    <a href='<?= CController::createUrl('/site/GraficasValor',array('choice'=>1)) ?>' class="btn btn-primary stretched-link">Criterios de Medida</a>
  </div>
</div>
<div class="card" style="width: 18rem;margin-left:15%">
  <img src="./img/ind.png" class="card-img-top">
  <div class="card-body">
    <a href='<?= CController::createUrl('/site/GraficasValor',array('choice'=>2)) ?>' class="btn btn-primary btn-lg stretched-link">Indicadores</a>
  </div>
</div>
</div>

<div class="row">
<div class="card" style="width: 18rem;margin-left:10%">
  <img src="./img/indop.jpg" class="card-img-top">
  <div class="card-body">
    <a href='<?= CController::createUrl('/site/GraficasValor',array('choice'=>3)) ?>'class="btn btn-primary btn-lg stretched-link">Indicadores del Proceso</a>
  </div>
</div>
<div class="card" style="width: 18rem;margin-left:15%">
  <img src="./img/indp.jpg" class="card-img-top">
  <div class="card-body">
    <a href='<?= CController::createUrl('/site/GraficasValor',array('choice'=>4)) ?>' class="btn btn-primary btn-lg stretched-link">Indicadores Operativos</a>
  </div>
</div>
</div>

