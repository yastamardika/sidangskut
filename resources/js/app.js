require('./bootstrap');
require('datatables.net-dt');
require('datatables.net-responsive-bs4');$(document).ready(function () {
    loading();
    $('.loading').delay(1000).fadeOut();
});

function loading() {
    $('.progress-bar');
}
