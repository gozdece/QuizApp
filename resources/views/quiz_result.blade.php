<x-app-layout>
<   x-slot name="header">
        <h3>{{$quiz->title}}</h3>
    </x-slot>
  
    @section('content')
    <div class="card">
  <div class="card-body">
    <p class="card-text">
        <div class="alert bg-light">
            <i class="fa fa-square"></i>İşaretlediğin Şık<br>
            <i class="fa fa-check text-success"></i>Doğru Cevap<br>
            <i class="fa fa-times text-danger"></i>Yanlış Cevap
        </div>
 
        @foreach($quiz->questions as $question)
        @if($question->correct_answer == $question->my_answer->answer)
            <i class="fa fa-check text-success"></i>
        @else
        <i class="fa fa-times text-danger"></i>
        @endif
        <strong>{{$loop->iteration}}.soru : </strong>{{$question->question}} </br>
        @if($question->image)
            <img src="{{asset($question->image)}}" style="width: 25%" alt="">
        @endif
        <div class="form-check" >
            @if('answer1'==$question->correct_answer)
            <li class="fa fa-check text-success"></li>
            @elseif('answer1'==$question->my_answer->answer)
            <li class="fa fa-square "></li>
            @endif
            <label class="form-check-label" for="answer1">
                {{$question->answer1}}
            </label>
        </div>
        <div class="form-check" >
            @if('answer2'==$question->correct_answer)
            <li class="fa fa-check text-success"></li>
            @elseif('answer2'==$question->my_answer->answer)
            <li class="fa fa-square "></li>
            @endif
            <label class="form-check-label" for="answer1">
                {{$question->answer2}}
            </label>
        </div>
        <div class="form-check" >
            @if('answer3'==$question->correct_answer)
            <li class="fa fa-check text-success"></li>
            @elseif('answer3'==$question->my_answer->answer)
            <li class="fa fa-square "></li>
            @endif
            <label class="form-check-label" for="answer1">
                {{$question->answer3}}
            </label>
        </div>
        <div class="form-check" >
            @if('answer4'==$question->correct_answer)
            <li class="fa fa-check text-success"></li>
            @elseif('answer4'==$question->my_answer->answer)
            <li class="fa fa-square "></li>
            @endif
            <label class="form-check-label" for="answer1">
                {{$question->answer4}}
            </label>
        </div>
        @if(!$loop->last)
        <hr>
        @endif
        
        @endforeach
        <button class="btn btn-primary float-right" type="submit"  > Quizi Bitir</button>

    </p>
    
</div>
    
    @endsection

</x-app-layout>
