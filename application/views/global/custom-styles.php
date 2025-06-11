<style>
    .navbar .navbar-nav .dropdown.dropdown-with-icon .dropdown-menu li a:before {
        display: none !important;
    }
    /* DARK MODE USER PROFILE WIDGET */
    body.dark .user-profile .widget-content-area {
        border-radius: 6px;
    }
    body.dark .user-profile .widget-content-area .edit-profile {
        height: 35px;
        width: 35px;
        display: flex;
        justify-content: center;
        align-self: center;
        /* background-color: $primary; */
        /* Can't use SCSS variables in plain CSS */
        background: linear-gradient(to left, #3cba92 100%, #0ba360 100%);
        border-radius: 50%;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14),
            0 1px 18px 0 rgba(0, 0, 0, 0.12),
            0 3px 5px -1px rgba(0, 0, 0, 0.2);
    }
    body.dark .user-profile .widget-content-area .edit-profile svg {
        font-size: 17px;
        vertical-align: middle;
        margin-left: 0;
        color: #060818;
        width: 19px;
        align-self: center;
    }
    body.dark .user-profile .widget-content-area h3 {
        font-size: 21px;
        color: #bfc9d4;
        margin: 6px 0 0 0px;
    }
    body.dark .user-profile .widget-content-area .user-info {
        margin-top: 40px;
    }
    body.dark .user-profile .widget-content-area .user-info img {
        border-radius: 9px;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14),
            0 1px 18px 0 rgba(0, 0, 0, 0.12),
            0 3px 5px -1px rgba(0, 0, 0, 0.2);
    }
    body.dark .user-profile .widget-content-area .user-info p {
        font-size: 20px;
        font-weight: 600;
        margin-top: 22px;
        color: #009688;
    }
    body.dark .user-profile .widget-content-area .user-info-list>div {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    body.dark .user-profile .widget-content-area .user-info-list ul.contacts-block {
        border: none;
        max-width: 217px;
        margin: 30px 0 0 0;
    }
    body.dark .user-profile .widget-content-area .user-info-list ul.contacts-block li {
        margin-bottom: 13px;
        font-weight: 600;
        font-size: 13px;
    }
    body.dark .user-profile .widget-content-area .user-info-list ul.contacts-block li a:not(.btn) {
        font-weight: 600;
        font-size: 15px;
        color: #009688;
    }
    body.dark .user-profile .widget-content-area .user-info-list ul.contacts-block a:not(.btn) svg {
        width: 21px;
        color: #888ea8;
        vertical-align: middle;
        fill: rgba(0, 23, 55, 0.08);
    }
    div.dataTables_wrapper div.dataTables_info {
        margin-top: 10px;
    }
</style>