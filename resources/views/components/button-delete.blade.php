<form method="POST" action="{{ route('files.destroy', $id) }}">
    @csrf
    @method('delete')
    <button class="btn btn-outline-warning" type="submit">Delete</button>
</form>
