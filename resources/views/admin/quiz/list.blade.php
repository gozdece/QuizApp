<x-app-layout>
<x-slot name="header">
        <h3>Quiz Listesi</h3>
    </x-slot>

  
@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success float-right" href="{{ route('quizzes.create') }}">Quiz Olustur</a>
            <form action="" method="GET">
              <div class="form-row">
                <div class="col-md-2">
                  <input type="text" name="title" placeholder="Quiz Adı" class="form-control" value="{{request()->get('title')}}">
                </div>
                <div class="col-md-2">
                  <select name="status" id="" onchange="this.form.submit()">
                    <option value="">Durum Seçiniz</option>
                    <option @if(request()->get('status')== 'publish') selected @endif value="publish">Aktif</option>
                    <option @if(request()->get('status')=='passive') selected @endif value="passive">Pasif</option>
                    <option @if(request()->get('status')=='draft') selected @endif value="draft">Taslak</option>
                  </select>
                </div>
                @if(request()->get('title') || request()->get('status'))
                <div class="col-md-2">
                  <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Sıfırla</a>
                </div>
                @endif
              </div>
            </form>
        </div>

        <div class="card-body">
        <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Quiz</th>
        <th scope="col">Soru Sayısı</th>
        <th scope="col">Durum</th>
        <th scope="col">Bitiş Tarihi</th>
        <th scope="col">İşlemler</th>
      </tr>
    </thead>
    <tbody>
    @foreach($quizzes as $quiz)
      <tr>
        <td>{{$quiz->title}}</td>
        <td>{{$quiz->questions_count}}</td>
        <td>
          @switch($quiz->status)
            @case('publish')
            <span class="badge bg-success">Yayında</span>
            @break
            @case('draft')
            <span class="badge bg-warning">Taslak</span>
            @break
            @case('passive')
            <span class="badge bg-danger">Pasif</span>
            @break
          @endswitch
        </td>
        <td>
          <span title="{{$quiz->finished_at}}">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</span>  
        </td>
        <td>
        <a class="btn btn-warning" href="{{ route('questions.index',$quiz->id) }}">SORU EKLE</a>
        <a class="btn btn-primary" href="{{ route('quizzes.edit',$quiz->id) }}">DUZENLE</a>
        <a class="btn btn-danger" href="{{ route('quizzes.destroy',$quiz->id) }}">SIL</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
        </div>
        
    </div>
   
@endsection

</x-app-layout>
