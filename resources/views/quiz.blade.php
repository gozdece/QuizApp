<x-app-layout>
<   x-slot name="header">
        <h3>{{$quiz->title}}</h3>
    </x-slot>
  
    @section('content')
    <div class="card">
  <div class="card-body">
    <p class="card-text">
        <form method="POST" action="{{route('quiz.result',$quiz->slug)}}">
            @csrf
        @foreach($quiz->questions as $question)
        <strong>{{$loop->iteration}}.soru : </strong>{{$question->question}} </br>
        @if($question->image)
            <img src="{{asset($question->image)}}" style="width: 25%" alt="">
        @endif
        <div class="form-check" >
            <input class="form-check-input" type="radio" name="{{$question->id}}" id="answer1" value="answer1" required>
            <label class="form-check-label" for="answer1">
                {{$question->answer1}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{$question->id}}" id="answer2" value="answer2" required>
            <label class="form-check-label" for="answer2">
                {{$question->answer2}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{$question->id}}" id="answer3" value="answer3" required>
            <label class="form-check-label" for="answer3">
                {{$question->answer3}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{$question->id}}" id="answer4" value="answer4" required>
            <label class="form-check-label" for="answer4">
                {{$question->answer4}}
            </label>
        </div>
        @if(!$loop->last)
        <hr>
        @endif
        
        @endforeach
        <button class="btn btn-primary float-right" type="submit"  > Quizi Bitir</button>
        <form>
    </p>
    
</div>
    
    @endsection

</x-app-layout>
