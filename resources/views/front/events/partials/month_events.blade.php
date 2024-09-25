<div class="schedule-timeline">
 @forelse($events as $event)
        <div class="schedule-block-two">
            <div class="inner-box">
                <div class="date-box">
                    <span class="count">{{ $loop->index + 1 }}</span>
                    <h4>{{ \Carbon\Carbon::parse($event->e_events_date)->format('d. F Y') }}</h4>
                    <span class="time">{{ \Carbon\Carbon::parse($event->e_events_from)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->e_events_to)->format('H:i') }}</span>
                </div>
                <h3><a href="{{route('reservation' ,  $event->id )}}">{{ $event->e_events_name }}</a></h3>
                <div class="speaker-info">
                        <div class="speaker">
                            <span class="designation">
                             Verfügbare Plätze - {{ $event->e_events_available }} 🪑 verfügbar
                            </span>
                        </div>
                </div>
                <div class="btn-box">
                    <a href="{{route('reservation' ,  $event->id )}}" class="theme-btn btn-style-one"><span class="btn-title">{{__('Book ticket')}}</span></a>
                </div>
            </div>
        </div>
    @empty
     <span class="no_events"> IN DIESEM MONAT GIBT ES NOCH KEINE TERMINE </span>
    @endforelse
</div>
