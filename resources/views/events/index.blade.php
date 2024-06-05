<x-app-layout>
{{--    <img src="{{ asset('img/event_banner.png') }}" alt="background">--}}
    <!-- Include necessary CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet" as="style" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" as="style"/>
    <style>
        /* Custom CSS for event body */
        .event-body {
            background-color: orange;
            color: white;
            padding: 5px;
        }

        #calendar {
            width: 100%;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <!-- Filters -->
            <div class="col-md-4 mb-3">
                <select id="departmentFilter" class="form-select">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <select id="yearFilter" class="form-select">
                    <option value="">Select Academic Year</option>
                    <option value="1">Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <select id="clubFilter" class="form-select">
                    <option value="">Select Club</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->club_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Event Calendar and Events List -->
            <div class="col-md-8">
                <h2 class="text-center">Event Calendar</h2>
                <div id="calendar"></div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <h4>Events on Selected Day</h4>
                <div id="event-list" class="list-group">
                    <!-- Event details will be listed here -->
                </div>
            </div>
        </div>
    </div>


    <!-- Include necessary scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendarEl = $('#calendar')[0]; // Select calendar element using jQuery
            var events = @json($events); // Assume this brings the initial array of events.

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: events.map(function(event) {
                    return {
                        title: event.title,
                        start: event.published_at,
                        allDay: true,
                        extendedProps: {
                            image: event.image,
                            body: event.body,
                            department_id: event.department_id,
                            academic_year: event.academic_year,
                            club_name: event.club_id
                        }
                    };
                }),
                eventClick: function(info) {
                    var eventDetails = $('#event-list');
                    eventDetails.html(`
                    <h5>${info.event.title}</h5>
                    <img src="${info.event.extendedProps.image}" alt="Event Image">
                    <p><strong>Event Details:</strong> ${info.event.extendedProps.body}</p>
                    <p><strong>Department:</strong> ${info.event.extendedProps.department_id}</p>
                    <p><strong>Academic Year:</strong> ${info.event.extendedProps.academic_year}</p>
                    <p><strong>Club:</strong> ${info.event.extendedProps.club_name}</p>
                `);
                },
                eventDidMount: function(info) {
                    var bodyEl = document.createElement('div');
                    bodyEl.classList.add('event-body');
                    bodyEl.innerHTML = `${info.event.extendedProps.body} (Dept: ${info.event.extendedProps.department_id}, Year: ${info.event.extendedProps.academic_year})`;
                    info.el.appendChild(bodyEl);
                },
            });

            calendar.render();
        });
    </script>
</x-app-layout>
