var t=document.querySelector(".mydatatable");
var rows=t.querySelectorAll("tr");
var p=document.querySelector(".dataTables_paginate");
if(rows.length<=10){
    $(p).hide();
}