<script src="<?php echo base_url() ?>assets/back_office/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/back_office/js/print.js"></script>
<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Special pages</a></li>
						<li class="breadcrumb-item active" aria-current="page">Invoice</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12">
            <div class="card" id="card">
              <div class="card-body">
                <div class="container-fluid d-flex justify-content-between">
                  <div class="col-lg-3 ps-0">
                    <a href="#" class="noble-ui-logo d-block mt-3">Noble<span>UI</span></a>                 
                    <p class="mt-1 mb-1"><b>NobleUI Themes</b></p>
                    <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                    <h5 class="mt-5 mb-2 text-muted">Proforma to :</h5>
                    <p><?php echo $proforma["responsable"]?><br> <?php echo $proforma["adresse"]?>,<br> <?php echo $proforma["email"]?> <br> <?php echo $proforma["contact"]?></p>
                  </div>
                  <div class="col-lg-3 pe-0">
                    <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">Proforma</h4>
                    <h6 class="text-end mb-5 pb-4"># <?php echo $proforma["idproforma"]?></h6>
                    <p class="text-end mb-1">Balance Due</p>
                    <h4 class="text-end fw-normal">$ 72,420.00</h4>
                    <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Invoice Date :</span> <?php echo $proforma["dateproformasent"]?></h6>
                    <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> <?php echo $proforma["dateproformareceived"]?></h6>
                  </div>
                </div>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                  <div class="table-responsive w-100">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                              <th>Nom materiel</th>
                              <th class="text-end">Nature</th>
                              <th class="text-end">Quantite</th>
                              <th class="text-end">Unite</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($global as $g) { ?>
                          <tr class="text-end">
                            <td class="text-start"><?php echo $g["nommateriel"];?></td>
                            <td ><?php echo $g["nomnature"];?></td>
                            <td><?php echo $g["qte"];?></td>
                            <td ><?php echo $g["nomunite"];?></td>
                          </tr>
                        <?php } ?> 
                        </tbody>
                      </table>
                    </div>
                </div>
                
                <div class="container-fluid w-100">
                  <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send" class="me-3 icon-md"></i>Send Invoice</a>
                  <a href="javascript:;" onclick="print('#card')" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>