<?php


//spl_autoload_register(function ($clasname){
//    include __DIR__."/{$clasname}.php";
//});

 function jojo ($clasname){
    include __DIR__."/{$clasname}.php";
}
spl_autoload_register('jojo');
?>
