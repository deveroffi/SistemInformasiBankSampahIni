@if(Auth::check())
    @if(Auth::user()->role == 'admin')
        <p>Selamat datang, Admin!</p>
    @elseif(Auth::user()->role == 'user')
        <p>Selamat datang, Pengguna!</p>
    @else
        <p>Selamat datang!</p>
    @endif
@else
    <p>Silakan login untuk melihat konten.</p>
@endif