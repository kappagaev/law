$(document).ready(function() {
    var $eventSelect = $('select');
console.log($eventSelect);
    $eventSelect.select2();
    $eventSelect.on("change", function (e) { $(this).trigger('change'); });
