<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/datatable-extension.css') }}">
<link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.css') }}">

<style>
    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        right:12px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: 82px;}

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 18%;}

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    ;/* text-align: right; */}

    @media  only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none
        }
        .chat-app .people-list.open {
            left: 0
        }
        .chat-app .chat {
            margin: 0
        }
        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }
        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto
        }
    }

    @media  only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }
        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media  only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }
        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>

<style>
    .loader {
        animation: spin 1s infinite linear;
        border: solid 2vmin transparent;
        border-radius: 50%;
        border-right-color: #09f;
        border-top-color: #09f;
        box-sizing: border-box;
        height: 15vmin;
        left: calc(44% - 10vmin);
        position: fixed;
        top: calc(84% - 10vmin);
        width: 15vmin;
        z-index: 1;
    }
    .loader:before {
        animation: spin 2s infinite linear;
        border: solid 2vmin transparent;
        border-radius: 50%;
        border-right-color: #3cf;
        border-top-color: #3cf;
        box-sizing: border-box;
        content: "";
        height: 11vmin;
        left: 0;
        position: absolute;
        top: 0;
        width: 11vmin;
    }
    .loader:after {
        animation: spin 3s infinite linear;
        border: solid 2vmin transparent;
        border-radius: 50%;
        border-right-color: #6ff;
        border-top-color: #6ff;
        box-sizing: border-box;
        content: "";
        height: 7vmin;
        left: 2vmin;
        position: absolute;
        top: 2vmin;
        width: 7vmin;
    }

    @keyframes  spin {
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<style>
    .loader {
        animation: spin 1s infinite linear;
        border: solid 2vmin transparent;
        border-radius: 50%;
        border-right-color: #09f;
        border-top-color: #09f;
        box-sizing: border-box;
        height: 15vmin;
        left: calc(44% - 10vmin);
        position: fixed;
        top: calc(84% - 10vmin);
        width: 15vmin;
        z-index: 1;
    }
    .loader:before {
        animation: spin 2s infinite linear;
        border: solid 2vmin transparent;
        border-radius: 50%;
        border-right-color: #3cf;
        border-top-color: #3cf;
        box-sizing: border-box;
        content: "";
        height: 11vmin;
        left: 0;
        position: absolute;
        top: 0;
        width: 11vmin;
    }
    .loader:after {
        animation: spin 3s infinite linear;
        border: solid 2vmin transparent;
        border-radius: 50%;
        border-right-color: #6ff;
        border-top-color: #6ff;
        box-sizing: border-box;
        content: "";
        height: 7vmin;
        left: 2vmin;
        position: absolute;
        top: 2vmin;
        width: 7vmin;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

</style>
