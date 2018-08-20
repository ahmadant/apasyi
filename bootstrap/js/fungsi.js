$(document).ready(function() {
// Selector input yang akan menampilkan autocomplete.
        $( "#nama" ).autocomplete({
                serviceUrl: "library/autocomplete.php",   // Kode php untuk prosesing data.
                dataType: "JSON",           // Tipe data JSON.
                onSelect: function (suggestion) {
                        $( "#nama" ).val("" + suggestion.nama);
                        $( "#nis" ).val("" + suggestion.nis);
                }
        });
        $( "#kamar" ).autocomplete({
                serviceUrl: "library/autocomplete-kam.php",   // Kode php untuk prosesing data.
                dataType: "JSON",           // Tipe data JSON.
                onSelect: function (suggestion) {
                        $( "#kamar" ).val("" + suggestion.kamar);
                        $( "#ustadz" ).val("" + suggestion.ustadz);
                }
        });
});