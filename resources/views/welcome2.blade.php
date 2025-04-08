@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="form-control" required>
    <button class="btn btn-primary mt-2">Upload Excel</button>
</form>
