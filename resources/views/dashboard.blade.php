<x-app-layout>
<   x-slot name="header">
        <h3>Quiz Listesi</h3>
    </x-slot>
  
    @section('content')
    <div class="col-md-8 float-left">
    <div class="list-group ">
        @foreach($quizzes as $quiz)
  <a href="{{ route('quiz.detail',$quiz->slug) }} " class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$quiz->title}}</h5>
      <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans().' bitiyor' : '-'}}</small>
    </div>
    <p class="mb-1">{{ Str::limit($quiz->description,100)}}</p>
    <small>{{$quiz->questions_count}} adet soru bulunuyor</small>
  </a>
  @endforeach
  
</div>
    </div>
    <div class="col-md-3 float-right">
        Deneme
    </div>
@endsection

</x-app-layout>
