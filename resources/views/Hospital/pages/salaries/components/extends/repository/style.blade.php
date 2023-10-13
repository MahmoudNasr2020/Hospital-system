<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/datatable-extension.css') }}">
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
