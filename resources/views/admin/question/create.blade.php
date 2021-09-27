<x-app-layout>
    <x-slot name="header">
        <h3>{{$quiz->title}}</h3>
        <h3>Quizi için soru oluştur</h3>
    </x-slot>

@section('content')
    <div class="card">
        
        <div class="card-body">
        <form method="POST" action=" {{ route('questions.store',$quiz->id) }} " enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="question">Soru</label>
                <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}">
            </div>
            <div class="form-group">
                <label for="image">İmage</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="answer1">1. Cevap</label>
                <input type="text" class="form-control" id="answer1" name="answer1" value="{{ old('answer1') }}">
            </div>
            <div class="form-group">
                <label for="answer2">2. Cevap</label>
                <input type="text" class="form-control" id="answer2" name="answer2" value="{{ old('answer2') }}">
            </div>
            <div class="form-group">
                <label for="answer3">3. Cevap</label>
                <input type="text" class="form-control" id="answer3" name="answer3" value="{{ old('answer3') }}">
            </div>
            <div class="form-group">
                <label for="answer4">4. Cevap</label>
                <input type="text" class="form-control" id="answer4" name="answer4" value="{{ old('answer4') }}">
            </div>
            <div class="form-group">
                <label for="correct_answer">Doğru Cevap</label>
                <select name="correct_answer" id="correct_answer">
                    <option value="answer1">1. Cevap</option>
                    <option value="answer2">2. Cevap</option>
                    <option value="answer3">3. Cevap</option>
                    <option value="answer4">4. Cevap</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Quiz Olustur</button>
            </div>
        </form>

        </div>
    </div>
    
@endsection


</x-app-layout>
