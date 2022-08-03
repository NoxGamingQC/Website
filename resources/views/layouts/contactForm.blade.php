<div class="row">
    <div class="col-md-6 text-center">
        <div style="margin:5%;margin-top: 15%">
            <h5 class="raleway-font"><a class="text-color" href="mailto:nox@noxgamingqc.ca">nox@noxgamingqc.ca</a></h5>
            <h5 class="raleway-font">819-852-8705</h5>
            <p>
                @include('layouts.socials')
            </p>
        </div>
    </div>
    <div class="col-md-6">
    <form class="form-horizontal" action="/contact" method="post">
            <div class="form-group">
                <label class="control-label">{{trans('contact.name')}} <i class="text-danger">*</i> </label>
                <input id="contactName" type="text" class="form-control" placeholder="{{trans('contact.enter_name')}}">
            </div>
            <div class="form-group">
                <label class="control-label">{{trans('contact.email')}} <i class="text-danger">*</i> </label>
                <input id="contactEmail" type="text" class="form-control" placeholder="{{trans('contact.enter_email')}}">
            </div>
            <div class="form-group">
                <label class="control-label">{{trans('contact.object')}} </label>
                <input id="contactObject" type="text" class="form-control" placeholder="{{trans('contact.enter_object')}}">
            </div>
            <div class="form-group">
                <label class="control-label">{{trans('contact.message')}} <i class="text-danger">*</i> </label>
                <textarea id="contactMessage" type="text" class="form-control" rows="4" placeholder="{{trans('contact.enter_message')}}"></textarea>
            </div>
            <div>
                {{trans('contact.required')}}<i class="text-danger">*</i>
            </div>
            <div class="text-center">
                <button type="button" id="submitContactForm" class="btn btn-success">{{trans('generic.send')}}</button>
            </div>
        </form>
    </div>
</div>