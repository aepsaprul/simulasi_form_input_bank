<form action="{{ route('nasabah.print_buku') }}" method="post">
    @csrf
    <input type="text" name="nasabah_id" id="nasabah_id" value="{{ $nasabah->id }}">
    <input type="text" name="halaman" id="halaman">
    <input type="text" name="baris" id="baris">
    <button type="submit">submit</button>
</form>
