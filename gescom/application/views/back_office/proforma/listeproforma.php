<div class="page-content">
<?php
$dep  = 'DEP3';
?>
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> ACHAT </a></li>
        <li class="breadcrumb-item active" aria-current="page">DEMANDE ACHAT</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between align-items-center mb-3">
            <h3 class="text-start mb-3">Liste des proformas : </h3>
          </div>
          
          <div class="container">  
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr class="table-info">
                      <th> Reference</th>
                      <th> Fournisseur</th>
                      <th> Date  envoie proforma</th>
                      <th> Date  reception proforma</th>
                      <th> Status</th>
                      <th> Progression </th>
                      <?php  $user = $this->session->userdata('user_data'); 
                        if($user['iddepartement'] == $dep){
                        ?>
                      <th>Receive</th>
                      <?php } ?>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($proformas as $proforma){ ?>
                      <tr >
                        <td> <?php echo $proforma['idproforma']; ?> </td>
                        <td> <?php echo $proforma['nomfournisseur']; ?> </td>
                        <td> <?php echo $proforma['dateproformasent']; ?> </td>
                        <td> <?php echo $proforma['dateproformareceived']; ?> </td>
                        <td> <span class="badge rounded-pill bg-info"> <?php echo $proforma['status'][0]; ?></span></td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $proforma['status'][1]; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <?php  
                        if($user['iddepartement'] == $dep){
                        ?>
                        <td class="text-center text-muted" style="width: 5%"> <a href="<?php echo site_url("index.php/back_office/proformaReceivedController/receive") ?>/<?php echo $proforma['idproforma']; ?>"><i data-feather="check-circle"></a></i></td>
                        <?php } ?>
                        <td class="text-center text-muted" style="width: 5%"> <a href="<?php echo site_url("index.php/back_office/proformaReceivedController/listeProformaCtrl") ?>/<?php  echo $proforma['status'][1] ; ?>/<?php echo $proforma['idproforma']; ?>"><i data-feather="eye"></a></i></td>
                      </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
                    </div>
        </div>
      </div>
    </div>
  </div>
</div>