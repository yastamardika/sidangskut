require('./bootstrap');
require('jquery');
require('datatables.net');
require('datatables.net-bs4');
require('datatables.net-responsive');
require('datatables.net-responsive-bs4');

$(document).ready(function () {
    $('#table').DataTable({
        aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        bProcessing: true,
        oLanguage: {
        sSearch: "Pencarian:",
        sLengthMenu: "Menampilkan data: _MENU_",
        sEmptyTable: "Tidak ada data. :(",
        sZeroRecords: "Data tidak ditemukan. :("
        },
        responsive: {
        details: {
            type: 'column',
            target: -1
        }
        },
        columnDefs: [{
        className: 'control',
        orderable: false,
        targets: -1
        }]
    });
    
    loading();
    $('.loading').delay(1000).fadeOut();
});

function loading() {
    $('.progress-bar');
}
