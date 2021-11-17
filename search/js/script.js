$(function () {
    $("#yearslider").slider({
        range: true,
        min: 1900,
        max: 2021,
        values: [1985, 2000],
        slide: function (event, ui) {
            $("#price").val(ui.values[0] + " - " + ui.values[1]);
        }
    });
    $("#price").val($("#yearslider").slider("values", 0) +
        " - " + $("#yearslider").slider("values", 1));
});