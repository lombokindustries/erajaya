<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.erajaya.com/assets/img/logo.png" class="logo" alt="Erajaya Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
