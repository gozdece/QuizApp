<x-app-layout>
    <x-slot name="header">
        <h3>Quiz oluştur</h3>
    </x-slot>

@section('content')
    <div class="card">
        
        <div class="card-body">
        <form method="POST" action=" {{ route('quizzes.store') }} " >
            @csrf
            <div class="form-group">
                <label for="email">Quiz Başlığı</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="desc">Açıklama</label>
                <input type="text" class="form-control" id="desc" name="description" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label>Bitiş Tarihi:</label>
                <input type="datetime-local" class="form-control" name="finished_at" value="{{ old('finished_at') }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Quiz Olustur</button>
            </div>
        </form>

        </div>
    </div>
    
@endsection


</x-app-layout>
