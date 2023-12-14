<?php
function personInfo($h = "Assalamuoyalaikum", $w = "Vai")
{
    return "$h $w<br>";
}

echo personInfo("Hello", "World");
echo personInfo("Hi", "Universe");
echo personInfo();
echo personInfo("Oi");
echo personInfo(w: "Brother");
