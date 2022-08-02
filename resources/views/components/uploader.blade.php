    <input type="file" name="file" required />
    <p class="help-block">{{ $errors->first('avatar') }}</p>

<script>
    FilePond.setOptions({
        server: {
            url: "{{ config('filepond.server.url') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
            }
        }
    });
    FilePond.create(document.querySelector('input[name="file"]'));
</script>
