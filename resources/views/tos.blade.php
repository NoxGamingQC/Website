@extends('layouts.app')
@section('title', trans('tos.tos'))
@section('content')

<div class="col-md-12" id="communityRules">
    <div class="panel panel-primary">
        <div class="panel-body">
            <h3><i class="fa fa-users" aria-hidden="true"></i> {{trans('welcome.community_rules')}}</h3>
            <hr />
            <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule01')}}</p>
            <br />
            <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule02')}}</p>
            <br />
            <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule03')}}</p>
            <br />
            <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule04')}}</p>
            <br />
            <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule05')}}</p>
            <br />
            <p><i class="fa fa-check-square success-text" aria-hidden="true"></i> {{trans('welcome.rule06')}}</p>
            <br />
            <p>{!!trans('welcome.rule_text')!!}</p>
        </div>
    </div>
</div>
@stop