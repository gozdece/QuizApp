<x-app-layout>
  < x-slot name="header">
    <h3>{{$quiz->title}} Quizi Detay Sayfası</h3>
    </x-slot>

    @section('content')

    <div class="col-md-8 float-right">
      <div class="card">
        <div class="card-body">
          <p class="card-text">{{$quiz->description}}</p>
          @if($quiz->my_result)
          <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary">Quizi Görüntüle</a>
          @else
          <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary">Quize Katıl</a>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4 float-left">
      <ul class="list-group">
        @if($quiz->my_result)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Sıralama
          <span class="badge bg-primary rounded-pill"><span title="">#{{$quiz->my_rank }}</span></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Puan
          <span class="badge bg-primary rounded-pill"><span title="">{{$quiz->my_result->point }}</span></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Doğru ve Yanlış Sayısı
          <span class="badge bg-success rounded-pill">
            <span title="">{{$quiz->my_result->correct}}Doğru</span>
          </span>
          <span class="badge bg-danger rounded-pill">
            <span title="">{{$quiz->my_result->wrong}}Yanlış</span>
          </span>
        </li>
        @endif
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Son Katılım Tarihi
          <span class="badge bg-primary rounded-pill"><span title="{{$quiz->finished_at}}">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</span></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Soru Sayısı
          <span class="badge bg-primary rounded-pill">{{$quiz->questions_count}}</span>
        </li>
        @if($quiz->details)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Katılımcı Sayısı
          <span class="badge bg-primary rounded-pill">{{$quiz->details['join_count']}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Ortalama Puan
          <span class="badge bg-primary rounded-pill">{{$quiz->details['average']}}</span>
        </li>
        @endif
      </ul>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">En İyiler</h5>
          <ul class="list-group">
            @foreach($quiz->topTen as $result)
            <li class= "list-group-item d-flex justify-content-between align-items-center">
              <strong>{{$loop->iteration}}.</strong>
                {{$result->user->name}}
            <span class="badge bg-primary rounded-pill">{{$result->point}}</span>
            </li>
            
            @endforeach
          
          </ul>
          
        </div>
      </div>
    </div>

    @endsection

</x-app-layout>