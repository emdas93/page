require('./bootstrap');
require('bootstrap');
window.$ = require('jquery');

$(document).ready(function(){
    // Sidebar
    $('#sideBarToggleBtn').click(function(e) {
        if ($(this).hasClass("bi-list")) {		// Sidebar Open
            // Icon 처리
            $(this).removeClass("bi bi-list");
            $(this).addClass("bi bi-x");

            // Sidebar 영역 표시 처리
            $('#sideBar').show(100);
            
        } else {											// Sidebar Close
            // Icon 처리
            $(this).removeClass("bi-x");
            $(this).addClass("bi bi-list");

            // Sidebar 영역 숨기기 처리
            $('#sideBar').hide(100);
        }
    })
})