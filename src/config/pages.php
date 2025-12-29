<?php
return [
    "home.php" => [
        "title"  => "Dashboard",
        "modals" => ["AddInfant", "AssignCaregiver", "Delete"],
        "data" => ['deleteId' => '']
    ],

    "profile.php" => [
        "title"  => "Profile",
        "modals" => ["ProfileInfo", "ProfileAddress"]
    ],

    "activity.php" => [
        "title"  => "Activity",
        "modals" => ["AddInfant", "EditInfant", "Delete"],
        "data" => ['deleteId' => '']
    ],

    "add-activity.php" => [
        "title"  => "AddActivity",
        "modals" => ["AddActivity", "EditActivity", "Delete"],
        "data" => [
            'editActivityId' => '',
            'editActivityName' => '',
            'editActivityCategory' => '',
            'editActivityDescription' => '',
            'deleteId' => ''
        ]
    ],

    "infant-report.php" => [
        "title"  => "Infant",
        "modals" => []
    ],

    "infant.php" => [
        "title"  => "InfantManager",
        "modals" => ["AddInfant", "EditInfant", "Delete"],
        "data" => [
            'editInfantId' => '',
            'editInfantFname' => '',
            'editInfantLname' => '',
            'editInfantDate' => '',
            'editInfantGender' => '',
            'editInfantTutorId' => '',
            'deleteId' => ''
        ]
    ],

    "user.php" => [
        "title"  => "UserManager",
        "modals" => ["EditUser", "Delete"],
        "data" => [
            'editUserId' => '',
            'editUserStatus' => '',
            'editUserLevel' => '',
            'deleteId' => ''
        ]
    ],

    "group-user.php" => [
        "title"  => "GroupUser",
        "modals" => ["AddGroup", "EditGroup", "Delete"],
        "data" => [
            'editGroupId' => '',
            'editGroupName' => '',
            'editGroupLevel' => '',
            'editGroupStatus' => '',
            'deleteId' => ''
        ]
    ],

    "products.php" => [
        "title"  => "ProductsList",
        "modals" => ["Delete"],
        "data" => ['deleteId' => '']
    ],

    "products-add.php" => [
        "title"  => "ProductsList",
        "modals" => []
    ],

    "products-edit.php" => [
        "title"  => "ProductsList",
        "modals" => []
    ],

    "products-category.php" => [
        "title"  => "Category",
        "modals" => ["AddCategory", "EditCategory", "Delete"],
        "data" => [
            'editCategoryId' => '',
            'editCategoryName' => '',
            'editCategoryType' => '',
            'deleteId' => ''
        ]
    ],
    "item-infant.php" => [
        "title"  => "ItemInfant",
        "modals" => ["EditItem", "Delete"],
        "data" => [
            'deleteId' => ''
        ]
    ],
    "item-infant-add.php" => [
        "title"  => "ItemInfant",
        "modals" => []
    ],
    "item-infant-edit.php" => [
        "title"  => "ItemInfant",
        "modals" => ['Delete'],
        "data" => [
            'deleteId' => ''
        ]
    ],
    "invoice-add.php" => [
        "title"  => "CreateInvoice",
        "modals" => ["Invoice"],
        "data" => [
            'pdfUrl' => ''
        ]
    ],
    "invoices.php" => [
        "title"  => "InvoiceHistory",
        "modals" => ["Delete"],
        "data" => [
            'pdfUrl' => '',
            'deleteId' => ''
        ]
    ],
];
