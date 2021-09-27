<x-app-layout>
<x-slot name="header">
        <h3 style="color:red">{{$quiz->title}}  </h3>
        <h3> Quizine Ait Sorular</h3>
    </x-slot>

  
@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{ route('questions.create',$quiz->id) }}">Soru Olustur</a>
        </div>
        <div class="card-body">
        <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Soru</th>
        <th scope="col">Fotograf</th>
        <th scope="col">1. Cevap</th>
        <th scope="col">2. Cevap</th>
        <th scope="col">3. Cevap</th>
        <th scope="col">4. Cevap</th>
        <th scope="col">Doğru Cevap</th>
        <th scope="col">İşlemler</th>
      </tr>
    </thead>
    <tbody>
        @foreach($quiz->questions as $question)
        <tr>
            <td>{{$question->question}}</td>
            <td>
                @if($question->image)
                <a href="{{asset($question->image)}}" class="btn btn-sm">Görüntüle</a>
                @endif
            </td>
            <td>{{$question->answer1}}</td>
            <td>{{$question->answer2}}</td>
            <td>{{$question->answer3}}</td>
            <td>{{$question->answer4}}</td>
            <td>{{substr($question->correct_answer,-1)}}. Cevap</td>
            <td>
                <a class="btn btn-primary" href="{{ route('questions.edit',[$quiz->id,$question->id]) }}">DUZENLE</a>
                <a class="btn btn-danger" href="{{ route('question.destroy',[$quiz->id,$question->id]) }}">SIL</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
        </div>
        
    </div>
    
@endsection

</x-app-layout>
