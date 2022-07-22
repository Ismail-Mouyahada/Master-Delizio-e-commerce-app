$(document).ready(function () {
     
 
    $(".js-search-category, .js-search-category2").select2(),
        $(".js-search-ingredients").select2({ maximumSelectionLength: 6 }),
        $("#sortable").sortable(),
        $("#sortable").disableSelection(),
        $(".btn-light").click(function () {
            event.preventDefault(),
            $("#sortable").append(`
                  <div class="box ui-sortable-handle">
                                        <div class="row">
                                            <div class="col-lg-1 col-sm-1">
                                                <i class="fa fa-arrows" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-lg-3 col-sm-3">
                                                <input type="text" name="ingredient[]" class="form-control"
                                                    placeholder="Nom de l'ingredient">
                                                @error('ingredient')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 col-sm-4">
                                                <input type="text" name="quantite[]" class="form-control"
                                                    placeholder="Quantité ou information additionnelle">
                                                @error('quantite')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-2 col-sm-2">
                                                <input type="text" name="unite[]" class="form-control"
                                                    placeholder="Unité">
                                                @error('unite')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>




                                            <div class="col-lg-1 col-sm-1">
                                                <i class="fa fa-times-circle-o minusbtn" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                `)
        }),
        $("#sortableStep").on("click", ".minusbtn", function () { $(this).parent().parent().parent().remove() });
    $("prevent").click(function (event) {
        event.preventDefault();});
    
 




});