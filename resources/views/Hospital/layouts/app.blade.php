<!DOCTYPE html>
<html lang="en" dir="rtl" >
<head>
    @include('Hospital.layouts.frontend.style')
</head>
<body onload="startTime()" class="rtl {{ \App\helper\settings()->style =='dark' ? 'dark-only' :'' }}">
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('Hospital.layouts.parts.header')
    <div class="page-body-wrapper">
        @include('Hospital.layouts.parts.sidebar')
        @include('Hospital.layouts.parts.content')
        @include('Hospital.layouts.parts.footer')
    </div>
</div>
@include('Hospital.layouts.frontend.script')
</body>
</html>
