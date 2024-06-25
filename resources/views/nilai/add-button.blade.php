@if(!getLogInUser()->hasRole('patient'))
<a href="{{ route('nilai.create') }}"
    class="btn btn-primary">Nilai Baru</a>
@endif
