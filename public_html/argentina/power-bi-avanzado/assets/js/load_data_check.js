function configurarCarrito(json) {

    if (typeof json.up_sell !== 'undefined') {
        var json1 = json
    } else {
        var json1 = json.data.param1;
    }

    var pf1 = json1.precio_full;
    var po1 = json1.precio_oferta;
    var precio_total = po1;

    //   var seleccionado1 = $("#up_sell1").is(":checked");
    var seleccionado2 = $("#up_sell2").is(":checked");
    /* if (seleccionado2 && seleccionado1) {
        // nivel 2 y 1

        var pf2 = json1.up_sell.item1.precio_full;
        var po2 = json1.up_sell.item1.precio_oferta;

        var pf3 = json1.up_sell.item2.precio_full;
        var po3 = json1.up_sell.item2.precio_oferta;
        $("#item_1").attr('style', '');
        $("#item_2").attr('style', '');
        $(".up_sell_item1_curso").html(json1.up_sell.item1.curso);
        $(".up_sell_item1_precio_oferta").html(json1.moneda[2] + $.number(po2, 0, ',', '.'));
        $(".up_sell_item2_curso").html(json1.up_sell.item2.curso);
        $(".up_sell_item2_precio_oferta").html(json1.moneda[2] + $.number(po2, 0, ',', '.'));
        precio_total = po1 + po2 + po3;


        $(".precio_total").html(json1.moneda[2] + $.number(precio_total, 0, ',', '.'));
        $('#curso').val('upsell_pb2_pbi_ex_int');


    } else if (seleccionado1) {

        // nivel 1 y 2
        var pf2 = json1.up_sell.item1.precio_full;
        var po2 = json1.up_sell.item1.precio_oferta;

        $("#item_1").attr('style', '');
        $("#item_2").attr('style', 'display: none!important');
        $(".up_sell_item1_curso").html(json1.up_sell.item1.curso);
        $(".up_sell_item1_precio_oferta").html(json1.moneda[2] + $.number(po2, 0, ',', '.'));
        precio_total = po2 + json1.precio_oferta


        $(".precio_total").html(json1.moneda[2] + $.number(precio_total, 0, ',', '.'));
        $('#curso').val(json1.up_sell.item1.codigo);
    } else*/

    if (seleccionado2) {
        // nivel 2 y 1
        var pf3 = json1.up_sell.item2.precio_full;
        var po3 = json1.up_sell.item2.precio_oferta;

        $("#item_2").attr('style', '');
        $("#item_1").attr('style', 'display: none!important');
        $(".up_sell_item2_curso").html(json1.up_sell.item2.curso);
        $(".up_sell_item2_precio_oferta").html(json1.moneda[2] + $.number(po3, 0, ',', '.'));
        precio_total = po3 + json1.precio_oferta


        $(".precio_total").html(json1.moneda[2] + $.number(precio_total, 0, ',', '.'));
        $('#curso').val(json1.up_sell.item2.codigo);
    } else {
        // nivel 1
        $("#item_1").attr('style', 'display: none!important');
        $("#item_2").attr('style', 'display: none!important');

        $(".nombre_curso").html(json1.curso);
        $(".precio_total").html(json1.moneda[2] + $.number(po1, 0, ',', '.'));
        $('#curso').val(json1.codigo);
    }
}
$.getJSON("assets/data/pbi_avanzado.json", function(json) {

    //    $("#up_sell1").click({ param1: json }, configurarCarrito);
    $("#up_sell2").click({ param1: json }, configurarCarrito);
    configurarCarrito(json);
    if (typeof json.up_sell !== 'undefined') {
        var json1 = json
    } else {
        var json1 = json.data.param1;
    }
    var precio_prom = (json.precio_full - json.precio_oferta);
    $('.nombre_curso').html(json1.curso);
    $("#prom-desc").text('- $' + parseFloat(precio_prom).toLocaleString('de-DE'));
    $(".precio_full").html(json1.moneda[2] + $.number(json1.precio_full, 0, ',', '.'));
    $(".precio_oferta").html(json1.moneda[2] + $.number(json1.precio_oferta, 0, ',', '.'));

    //  $(".up_sell_item1_curso").html(json1.up_sell.item1.curso);
    //  $(".up_sell_item1_precio_full").html(json1.moneda[2] + $.number(json1.up_sell.item1.precio_full, 0, ',', '.'));
    //  $(".up_sell_item1_precio_oferta").html(json1.moneda[2] + $.number(json1.up_sell.item1.precio_oferta, 0, ',', '.') + ' ' + json1.moneda[1]);
    $(".up_sell_item2_curso").html(json1.up_sell.item2.curso);
    $(".up_sell_item2_precio_full").html(json1.moneda[2] + $.number(json1.up_sell.item2.precio_full, 0, ',', '.'));
    $(".up_sell_item2_precio_oferta").html(json1.moneda[2] + $.number(json1.up_sell.item2.precio_oferta, 0, ',', '.') + ' ' + json1.moneda[1]);
});