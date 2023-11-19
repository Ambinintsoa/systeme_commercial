<div class="page-content">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card" style="margin: auto;">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Sortie Stock</h6>

                                <form class="forms-sample" action="AddSortie" method="POST">
                                    <div class="mb-3">
                                      <label class="form-label">Produit</label>
                                      <select class="form-select form-select-sm mb-3" name="article">
                                        <option selected > </option>
                                        <option value="1">1</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Magasin</label>
                                        <select class="form-select form-select-sm mb-3" name="magasin">
                                          <option selected></option>
                                          <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quantite</label>
                                        <input type="number" class="form-control" name="quantite">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>