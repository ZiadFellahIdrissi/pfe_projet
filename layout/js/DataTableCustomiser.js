$("input[type='search']").addClass(" shadow-lg bg-white rounded");

if ($(".mydatatable tr").length < 11) {
    $(".dataTables_paginate").eq(0).hide();
    $(".dataTables_length:first").eq(0).hide();
    $(".dataTables_info:first").eq(0).hide();
}

if ($(".mydatatable2 tr").length < 11) {
    $(".dataTables_paginate").eq(1).hide();
    $(".dataTables_length").eq(1).hide();
    $(".dataTables_info").eq(1).hide();
}