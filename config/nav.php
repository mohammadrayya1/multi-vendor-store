<?php

return[
        [
            'icon'=>"nav-icon fas fa-tachometer-alt",
            "route"=>"dashboard.",
            "title"=>"Dashboard",
            'active'=>"dashboard.",
        ],
    [
        'icon'=>"far fa-circle nav-icon ",
        "route"=>"dashboard.categories.index",
        "title"=>"Categories",
        "active"=>"dashboard.categories.*"
    ],
    [
        'icon'=>"far fa-circle nav-icon ",
        "route"=>"dashboard.products.index",
        "title"=>"Product",
        "active"=>"dashboard.products.*"
    ],
    [
        'icon'=>"far fa-circle nav-icon ",
        "route"=>"dashboard.categories.index",
        "title"=>"Orders",
        "active"=>"dashboard.orders.*"
    ],
]



?>
