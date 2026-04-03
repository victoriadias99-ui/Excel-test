function configurarCarrito(json) {

    if (typeof json.up_sell !== 'undefined') {
        var json1 = json
    } else {
        var json1 = json.data.param1;
    }
    var pf1 = json1.precio_full;
    var po1 = json1.precio_oferta;
    var precio_total = po1;

    var seleccionado1 = $("#up_sell1").is(":checked");

    if (seleccionado1) {
        // nivel 1 y 2
        var pf2 = json1.up_sell.precio_full;
        var po2 = json1.up_sell.precio_oferta;

        $("#item_1").attr('style', '');
        $(".up_sell_curso1").html(json1.up_sell.curso);
        $(".up_sell_precio_oferta").html(json1.moneda[2] + $.number(po2, 0, ',', '.'));
        precio_total = po1 + json1.up_sell.precio_oferta;

        $(".precio_total").html(json1.moneda[2] + $.number(precio_total, 0, ',', '.'));
        $('#curso').val(json1.up_sell.codigo);
    } else {
        // nivel 1
        $("#item_1").attr('style', 'display: none!important');
        $(".nombre_curso").html(json1.curso);
        $(".precio_total").html(json1.moneda[2] + $.number(po1, 0, ',', '.'));
        $('#curso').val(json1.codigo);
    }
}
$.getJSON("assets/data/google_sheet.json", function(json) {

    $("#up_sell1").click({ param1: json }, configurarCarrito);
    //$('window').load({ param1: json }, configurarCarrito);
    configurarCarrito(json);


    var precio_prom = (json.precio_full - json.precio_oferta);

    $("#prom-desc").text('- $' + parseFloat(precio_prom).toLocaleString('de-DE'));
    $(".precio_full").html(json.moneda[2] + $.number(json.precio_full, 0, ',', '.'));
    $(".precio_oferta").html(json.moneda[2] + $.number(json.precio_oferta, 0, ',', '.'));
    $(".up_sell_curso").html(json.up_sell.curso);
    $(".up_sell_precio_full2").html(json.moneda[2] + $.number(json.up_sell.precio_full, 0, ',', '.'));
    $(".up_sell_precio_oferta2").html(json.moneda[2] + $.number(json.up_sell.precio_oferta, 0, ',', '.') + ' ' + json.moneda[1]);
});