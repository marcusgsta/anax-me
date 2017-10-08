<?php


return [
    "config" => [
        "navbar-class" => "navbar navbar-expand-lg navbar-light"
        // "navbar-class" => "navbar navbar-toggleable-md navbar-light bd-faded"
    ],
    "items" => [
        "hem" => [
            "text" => "Hem",
            "route" => "",
        ],
        "about" => [
            "text" => "Om",
            "route" => "about",
        ],
        "report" => [
            "text" => "Redovisningar",
            "route" => "report",
        ],
        "remserver" => [
            "text" => "Remserver",
            "route" => "remserver",
        ],
        "books" => [
            "text" => "Böcker",
            "route" => "book",
        ],
        "profile" => [
            "text" => "Min profil",
            "route" => "user/profile",
        ],
    ]
];
