<x-app-layout>
    <x-slot name="header">
        <h3>{{$question->question}}</h3>
        <h3>sorusunu güncelleyin</h3>
    </x-slot>

@section('content')
    <div class="card">
        
        <div class="card-body">
        <form method="POST" action=" {{route('questions.update',[$question->quiz_id,$question->id])}} " enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="question">Soru</label>
                <input type="text" class="form-control" id="question" name="question" value="{{ $question->question }}">
            </div>
            <div class="form-group">
                <label for="image">Fotoğraf</label></br>
                <a href="{{asset($question->image)}}" target="_blank">
                <img src="{{ asset($question->image) }}" alt="" style="width:200px" >
                </a>
                <input type="file" class="form-control" id="image" name="image" value="{{ $question->image }}">
            </div>
            <div class="form-group">
                <label for="answer1">1. Cevap</label>
                <input type="text" class="form-control" id="answer1" name="answer1" value="{{ $question->answer1 }}">
            </div>
            <div class="form-group">
                <label for="answer2">2. Cevap</label>
                <input type="text" class="form-control" id="answer2" name="answer2" value="{{ $question->answer2 }}">
            </div>
            <div class="form-group">
                <label for="answer3">3. Cevap</label>
                <input type="text" class="form-control" id="answer3" name="answer3" value="{{ $question->answer3 }}">
            </div>
            <div class="form-group">
                <label for="answer4">4. Cevap</label>
                <input type="text" class="form-control" id="answer4" name="answer4" value="{{ $question->answer4 }}">
            </div>
            <div class="form-group">
                <label for="correct_answer">Doğru Cevap</label>
                <select name="correct_answer" id="correct_answer">
                    <option @if($question->correct_answer==='answer1') selected @endif value="answer1">1. Cevap</option>
                    <option @if($question->correct_answer==='answer2') selected @endif value="answer2">2. Cevap</option>
                    <option @if($question->correct_answer==='answer3') selected @endif value="answer3">3. Cevap</option>
                    <option @if($question->correct_answer==='answer4') selected @endif value="answer4">4. Cevap</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Soru Güncelle</button>
            </div>
        </form>

        </div>
    </div>
    
@endsection


</x-app-layout>
