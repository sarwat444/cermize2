<td>
    <ul class="action">
        <li class="view" style="margin-right: 5px;"><a href="{{route('panel.events.view_events' , $id)}}"><i style="color: #626262 !important;" class="icon-eye"></i></a></li>
        <li class="edit"><a href="{{route('panel.events.edit.index' , $id)}}"><i class="icon-pencil-alt"></i></a></li>
        <li class="delete"><a href="javascript:" class="delete_item_event" data-url="{{route('panel.events.delete',$id)}}"><i
                    class="icon-trash"></i></a></li>
    </ul>
</td>
