$.getJSON("assets/data/google_sheet.json", function(json) {

    $(".precio_full").html(json.moneda[2] + $.number(json.precio_full, 0, ',', '.'));

    $(".precio_oferta").html(json.moneda[2] + $.number(json.precio_oferta, 0, ',', '.'));

});