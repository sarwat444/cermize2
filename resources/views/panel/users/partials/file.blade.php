@if($user->file)
<td class="file-icon">
      <a href="{{ asset(config('constants.asset_path') . $user->file) }}"><i class="fa fa-file"></i></a>
</td>
@else
    <td>
      <span class="badge badge-danger"> No Files</span>
    </td>
@endif
