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

function array_map_assoc($arr){
    $str = "";
    for($i=0;$i<count($arr);$i++)
    {
        $str .= implode(":",$arr[$i]).', ';
    }

    return $str;
  }