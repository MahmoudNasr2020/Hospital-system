@extends('Hospital.layouts.app')
@section('style')
    <link rel='stylesheet' href="{{ asset('Dashboard/assets/plugins/calendar/main.css') }}" />
    <script src="{{ asset('Dashboard/assets/plugins/calendar/main.js') }}"></script>
    <script>
            // page is now ready, initialize the calendar...
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    direction: 'rtl',
                    locale:'ar',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth',
                    },
                    eventLimit: true,

                    events: [
                        @foreach($attendances as $attendance)
                        @php
                                $att='';
                                $color='';
                                if($attendance->attendance == 'نصف_يوم')
                                {
                                    $att = 'نصف يوم';
                                }
                                else
                                    {
                                    $att = $attendance->attendance;
                                }

                                if($attendance->attendance == 'حاضر')
                                {
                                    $color = 'green';
                                }
                                else if ($attendance->attendance == 'نصف_يوم')
                                {
                                    $color = '#5c25bb';
                                }
                                else if ($attendance->attendance == 'متاخر')
                                {
                                    $color = 'blue';
                                }
                                else
                                {
                                    $color = '#ff0000';
                                }
                            @endphp

                            { // this object will be "parsed" into an Event Object
                                title: "{{ $att }}", // a property!
                                start: "{{ date('Y-d-m',strtotime($attendance->date)) }}", // a property!
                                end: "{{ date('Y-d-m',strtotime($attendance->date)) }}", // a property!
                                display: 'background',
                               color: "{{ $color }}"
                             },
                        @endforeach
                    ],



                });
                calendar.render();


                var calendarSalary = document.getElementById('calendarSalary');
                var calendarsalary = new FullCalendar.Calendar(calendarSalary, {
                    initialView: 'dayGridMonth',
                    direction: 'rtl',
                    locale:'ar',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth',
                    },
                    eventLimit: true,
                    events: [
                        @foreach($salaries as $salary)

                            { // this object will be "parsed" into an Event Object
                                title: "مدفوع", // a property!
                                start: "{{ $salary->date }}", // a property
                                display: 'background',
                                color: "green"
                             },
                        @endforeach
                    ],

                });
                calendarsalary.render();
            });
    </script>
@endsection
@section('header_line')
    <li class="breadcrumb-item">البروفايل</li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if($data->user_type == 'admin')
                @include('Hospital.pages.account.components.include.admin')
            @else
                @include('Hospital.pages.account.components.include.user')
            @endif
        </div>
    </div>

    @include('Hospital.pages.account.components.include.imageShow',['photo'=>$data->photo])
@endsection

@section('script')



@endsection
