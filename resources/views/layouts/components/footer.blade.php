<div class="footer">
    <div class="container">
        <div class="row">
        <div class="col-md-4 text-center">
                <h3>
                    Contact
                </h3>
                <br />
                <h5 class="raleway-font">jbedard@noxgamingqc.ca</h5>
            </div>
            <div class="col-md-4 text-center">
                <img src="/img/logo.png" alt="logo" width="150px">
                <br />
                <h5 class="raleway-font">{{trans('general.copyright_noxgamingqc')}}</h5>
                <br />
            </div>
            <div class="col-md-4 text-center">
                <h3>
                    Socials
                </h3>
                <br />
                <p>
                    @include('layouts.components.socials')
                </p>
            </div>
            <div class="col-md-12 text-center">
                <p><small>commit: {{$sourceVersion}}<small></p>
            </div>
        </div>
    </div>
</div>
