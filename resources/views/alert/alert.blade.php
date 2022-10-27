@if($alerts)
    @foreach($alerts as $key => $alert)
        @if(array_key_exists('success', $alert))
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-body alert-success text-center">
                        <h4 class="title">{{$alert['success']->title}}</h4>
                        <p class="text">{{$alert['success']->text}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(array_key_exists('warning', $alert))
            <div class="row">
                <div class="panel panel-warning">
                    <div class="panel-body alert-warning text-center">
                        <h4 class="title">{{$alert['warning']->title}}</h4>
                        <p class="text">{{$alert['warning']->text}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(array_key_exists('danger', $alert))
            <div class="row">
                <div class="panel panel-danger">
                    <div class="panel-body alert-error text-center">
                        <h4 class="title">{{$alert['danger']->title}}</h4>
                        <p class="text">{{$alert['danger']->text}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(array_key_exists('info', $alert))
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