$(document).ready(function() {
$(".js-search-category, .js-search-category2").select2(),
$(".js-search-ingredients").select2({
    maximumSelectionLength: 10
}),
$("#sortable").sortable(),
$("#sortable").disableSelection(),
$(".btn-light").click(function() {
    event.preventDefault(),
    $("#sortable").append(`
            <div class="box ui-sortable-handle">
            <div class="row">
                <div class="col-lg-1 col-sm-1">
                <i class="fa fa-arrows" aria-hidden="true"></i>
                </div>
                <div class="col-lg-3 col-sm-3">
                <input type="text" name="ingredient[]" class="form-control" placeholder="Nom de l'ingredient">

                </div>
                <div class="col-lg-4 col-sm-4">
                <input type="text" name="quantite[]" class="form-control" placeholder="Quantité ou information additionnelle">

                </div>
                <div class="col-lg-2 col-sm-2">
                <input type="text" name="unite[]" class="form-control" placeholder="Unité">

                </div>
                <div class="col-lg-1 col-sm-1">
                <i class="fa fa-times-circle-o minusbtn" aria-hidden="true"></i>
                </div>
            </div>
            </div>


        `)
}),
$("#sortable").on("click", ".minusbtn", function() {
    $(this).parent().parent().parent().remove()
});



$(".stepGen").click(function() {
    event.preventDefault(),
    $("#sortableStep1").append(`
        <div class="box ui-sortable-handle">
            <div class="row">
            <div class="col-lg-1 col-sm-1">
                <i class="fa fa-arrows" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 col-sm-12">
                <input type="text" name="step_title[]" id="step_title" class="form-control" placeholder="nom de l'étape">

            </div>

            <div class="col-lg-12 col-sm-12">

                <textarea name="step_details[]" id="step_details" class="w-100 my-2" rows="6" placeholder="description de l'etape "></textarea>


            </div>

            <div class="col-lg-1 col-sm-1">
                <i class="fa fa-times-circle-o minusbtn1" aria-hidden="true"></i>
            </div>
            </div>
        </div>


        `);
}),
$("#sortableStep1").on("click", ".minusbtn1", function() {
    $(this).parent().parent().parent().remove()
});


$("prevent").click(function(event) {
event.preventDefault();
});








});
