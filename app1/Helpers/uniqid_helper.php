<?php 

function generateHash()
{
    return bin2hex(random_bytes(16));
}

function convertDateSQL()
{
    return date('Y-m-d h:m:s');
}


function convertDate($date)
{
    return date('Y-m-d', strtotime($date));
}
function convertDatetime($date)
{
    return date('Y-m-d h:m:s', strtotime($date));
}