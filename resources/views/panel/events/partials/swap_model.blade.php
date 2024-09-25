<!-- Modal -->
<div class="modal fade" id="swapModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-6" id="exampleModalLabel">Sitzposition ändern</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="seat_details">
                  <ul>
                      <li><b>Benutzername : </b><span>..</span> </li>
                      <li><b>E-Mail: </b><span>..</span> </li>
                      <li><b>Telefon : </b><span>..</span>  </li>
                      <li><span>Sitznummer : </span>  <span class="badge badge-primary fs-7" style="color: #fff"  id="seat_count">4</span></li>
                  </ul>

                </div>
                <form method="post" action="{{route('panel.events.change_seat_postition')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="group">Gruppe</label>
                        <select class="form-control" name="group_id" id="group">
                            <option disabled selected>Gruppe auswählen</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="seat_number">Sitznummer</label>
                        <select class="form-control" name="target_seat_number" id="seat_number">
                            <option disabled selected>Wählen Sie zuerst die Gruppe aus</option>
                        </select>
                    </div>
                    <input type="hidden" value="{{$event->id}}" name="event_id">
                    <input type="hidden" name="current_seat_number" id="current_seat_number">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Speichern</button>
            </div>
        </div>
        </form>
    </div>
</div>
