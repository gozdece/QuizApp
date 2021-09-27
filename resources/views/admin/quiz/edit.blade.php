<x-app-layout>
    <x-slot name="header">
        <h3>Quiz Guncelle</h3>
    </x-slot>

@section('content')
    <div class="card">
        
        <div class="card-body">
        <form method="POST" action=" {{ route('quizzes.update',$quiz->id) }} " >
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="email">Quiz Başlığı</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $quiz->title }}">
            </div>
            <div class="form-group">
                <label for="desc">Açıklama</label>
                <input type="text" class="form-control" id="desc" name="description" value="{{ $quiz->description }}">
</div>
            <div class="form-group">
                <label for="status">Durum</label></br>
                <select name="status" id="status">
                    
                    <option @if($quiz->questions_count < 4) disabled @endif @if($quiz->status==='publish') selected @endif value="publish">Aktif</option>
                    <option @if($quiz->status==='draft') selected @endif value="draft">Taslak</option>
                    <option @if($quiz->status==='passive') selected @endif value="passive">Pasif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Bitiş Tarihi:</label>
                <input type="datetime-local" class="form-control"  name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime( $quiz->finished_at) ) }}" @endif>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Quiz Guncelle</button>
            </div>
        </form>

        </div>
    </div>
    
@endsection


</x-app-layout>
