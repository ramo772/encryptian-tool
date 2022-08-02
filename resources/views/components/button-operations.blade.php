<form method="POST" action="{{ route($operation, $id) }}">
    @csrf
    @method('put')
    <button  class="{{ $operation == 'encrypt' ? 'btn btn-outline-danger' : 'btn btn-outline-secondary' }}"
        type="submit">{{ $operation }}</button>
</form>
