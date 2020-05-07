@if(session('alert'))
    @foreach(session('alert') as $key => $alert)
        @if($alert['success'])
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-body alert-success text-center">
                        <h4 class="title">{{$alert['success']->title}}</h4>
                        <p class="text">{{$alert['success']->text}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if($alert['warning'])
            <div class="row">
                <div class="panel panel-warning">
                    <div class="panel-body alert-warning text-center">
                        <h4 class="title">{{$alert['warning']->title}}</h4>
                        <p class="text">{{$alert['warning']->text}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if($alert['danger'])
            <div class="row">
                <div class="panel panel-danger">
                    <div class="panel-body alert-error text-center">
                        <h4 class="title">{{$alert['danger']->title}}</h4>
                        <p class="text">{{$alert['danger']->text}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if($alert['info'])
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-body alert-info text-center">
                        <h4 class="title">{{$alert['info']->title}}</h4>
                        <p class="text">{{$alert['info']->text}}</p>
                    </div>
                </div>
            </div>
            @endif
    @endforeach
@endif