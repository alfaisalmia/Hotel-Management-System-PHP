<?php

$title = "Hotel Alpha";
$act = "home";
if (isset($_GET['f'])) {
    if ($_GET['f'] == "home") {
        $title = "Hotel Alpha";
        $act = "home";
    } else if (($_GET['f']) == "login") {
        $title = "Login";
        $act = "login";
    } else if (($_GET['f']) == "signup") {
        $title = "Signup";
        $act = "signup";
    } else if (($_GET['f']) == "logout") {
        $title = "Logout";
    } else if (($_GET['f']) == "profile") {
        $title = "Login";
    } else if (($_GET['f']) == "forgot-password") {
        $title = "Forgot Password";
    } else if (($_GET['f']) == "login") {
        $title = "Login";
    } else if (($_GET['f']) == "room-search") {
        $title = "Searching Result";
    } else if (($_GET['f']) == "room-details") {
        $title = "Room Details";
    } else if (($_GET['f']) == "booking-system") {
        $title = "Booking System";
    }else if (($_GET['f']) == "gallery") {
        $title = "gallery";
    }else if (($_GET['f']) == "faq") {
        $title = "faq";
    }else if (($_GET['f']) == "contact") {
        $title = "contact";
    }else if (($_GET['f']) == "blog") {
        $title = "blog";
    }
}
if (isset($_GET['e'])) {
    if ($_GET['e'] == "home") {
        $title = "Hotel Alpha";
        $act = "home";
    } else if (($_GET['e']) == "country") {
        $title = "Country Area";
        $act = "country";
    } else if (($_GET['e']) == "country-views") {
        $title = "Country View";
    } else if (($_GET['e']) == "country-update") {
        $title = "Country Update";
    } else if (($_GET['e']) == "payment") {
        $title = "Payment";
    } else if (($_GET['e']) == "payment-view") {
        $title = "Payment View";
    } else if (($_GET['e']) == "roomtype") {
        $title = "Room Type";
    } else if (($_GET['e']) == "roomtype-views") {
        $title = "Room Type View";
    } else if (($_GET['e']) == "services") {
        $title = "Service";
    } else if (($_GET['e']) == "services-views") {
        $title = "Services View";
    } else if (($_GET['e']) == "room") {
        $title = "Room";
    } else if (($_GET['e']) == "room-view") {
        $title = "Room View";
    } else if (($_GET['e']) == "room-update") {
        $title = "Room Update";
    } else if (($_GET['e']) == "ourstaff") {
        $title = "Our Staff";
    } else if (($_GET['e']) == "ourstaff-view") {
        $title = "Our Staff View";
    } else if (($_GET['e']) == "ourstaff-update") {
        $title = "Staff Update";
    } else if (($_GET['e']) == "coupon") {
        $title = "Coupon";
    } else if (($_GET['e']) == "coupon-views") {
        $title = "Coupon View";
    } else if (($_GET['e']) == "coupon-update") {
        $title = "Coupon Update";
    } else if (($_GET['e']) == "designation") {
        $title = "Designation";
    } else if (($_GET['e']) == "designation-views") {
        $title = "Designation View";
    } else if (($_GET['e']) == "designation-update") {
        $title = "Designation Update";
    } else if (($_GET['e']) == "menutype") {
        $title = "Menutype";
    } else if (($_GET['e']) == "menutype-views") {
        $title = "Menutype View";
    } else if (($_GET['e']) == "menutype-update") {
        $title = "Menutype Update";
    } else if (($_GET['e']) == "hallroom") {
        $title = "Hall Room";
    } else if (($_GET['e']) == "hallroom-view") {
        $title = "Hall Room View";
    } else if (($_GET['e']) == "hallroom-update") {
        $title = "Hall Room Update";
    } else if (($_GET['e']) == "roominstallment") {
        $title = "Room Installment";
    } else if (($_GET['e']) == "roominstallment_view") {
        $title = "Room Installment View";
    } else if (($_GET['e']) == "roominstallment_update") {
        $title = "Room Installment Update";
    } else if (($_GET['e']) == "room-package") {
        $title = "Room Package";
    } else if (($_GET['e']) == "roompackage-view") {
        $title = "Room Package View";
    } else if (($_GET['e']) == "roompackage-updat") {
        $title = "Room Package Update";
    } else if (($_GET['e']) == "salary-insert") {
        $title = "Salary Information";
    } else if (($_GET['e']) == "salary-views") {
        $title = "Salary View";
    } else if (($_GET['e']) == "salary-update") {
        $title = "Salary Update";
    } else if (($_GET['e']) == "menu") {
        $title = "Salary Information";
    } else if (($_GET['e']) == "roombooking") {
        $title = "Salary Information";
    }
}

if (isset($_GET['a'])) {
    if ($_GET['a'] == "home") {
        $title = "Hotel Alpha";
        $act = "home";
    }
    else if (($_GET['a']) == "salary-report") {
        $title = "Salary Report";
    }
}