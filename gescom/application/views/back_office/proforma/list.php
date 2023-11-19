
<div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card" style="margin:auto">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Liste Demande</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Proforma</th>
                                        <th>Nom Fournisseur</th>
                                        <th>Email</th>
                                        <th>Date Sent</th>
                                        <th>Date Received</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($proforma as $p) { ?>
                                    <tr>
                                        <th><code><?php echo $p["idproforma"];?></code></th>
                                        <td><?php echo $p["nomfournisseur"];?></td>
                                        <td><?php echo $p["email"];?></td>
                                        <td><?php echo $p["dateproformasent"];?></td>
                                        <td><?php echo $p["dateproformareceived"];?></td>
                                        <td>
                                            <a href="demande/<?php echo $p["idproforma"];?>" >Details</a>
                                        </td>
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