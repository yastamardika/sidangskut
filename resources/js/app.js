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

$(document).ready(function(){
    const icon = document.getElementById("iconShowHide");
    const pwd = document.getElementById("password");
    const pwdConfirm = document.getElementById("password-confirm");

    $("#togglePassword").on('click', function (e) {
        const type1 = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
        pwd.setAttribute('type', type1);
        // toggle the eye slash icon
        if (icon.classList.contains("bx-hide")) {
            icon.classList.remove("bx-hide");
            icon.classList.add("bx-show");
        } else {
            icon.classList.remove("bx-show");
            icon.classList.add("bx-hide");
        }
    });

    $("#toggleConfirmPassword").on('click', function (e) {
        const type2 = pwdConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        pwdConfirm.setAttribute('type', type2);
        // toggle the eye slash icon
        if (icon.classList.contains("bx-hide")) {
            icon.classList.remove("bx-hide");
            icon.classList.add("bx-show");
        } else {
            icon.classList.remove("bx-show");
            icon.classList.add("bx-hide");
        }
    });

    $("#form-file").on("change", function(){
        const file = document.getElementById("form-file").files[0];
        document.getElementById("nameFiles").innerHTML = "File: "+file.name;
    });
    $("#changeRole").on("change", function(){
        const value = $("input[name=role]:checked").val();
        if (value == 'kaprodi') {
            $("#prodi").addClass("d-table-row");
            $("#prodi").removeClass("d-none");
        } else {
            $("#prodi").addClass("d-none");
            $("#prodi").removeClass("d-table-row");
        }
    });

});

window.addEventListener("pageshow", function(){
    const ele = document.getElementsByName('role');

    for(i = 0; i < ele.length; i++) {
        if(ele[i].checked) {
            if (ele[i].value == 'kaprodi') {
                $("#prodi").addClass("d-table-row");
                $("#prodi").removeClass("d-none");
            } else {
                $("#prodi").addClass("d-none");
                $("#prodi").removeClass("d-table-row");
            }
        }
    }
});