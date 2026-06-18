<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-0 no-print" style="z-index: 1030;border-bottom: 1px solid rgba(0,0,0,0.1);">
  <div class="container-fluid px-3 py-3">
     <a class="navbar-brand" href="#">
        <img src="{{ app()->getLocale() == 'fr-ca' ? $company->logo_fr : $company->logo_en }}" alt="{{ app()->getLocale() == 'fr-ca' ? $company->name_fr : $company->name_en }}" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="nav nav-pills navbar-nav">
            <li class="nav-item">
                <li><a class="nav-link px-3 py-3 {{isset($currentPage) ? ($currentPage == 'generate-barcode' ? 'active' : '') : ''}}" href="/{{app()->getLocale()}}/tools/generate-barcode{{ request('company') ? '?company='.request('company') : '' }}" style="height:100%; margin:0px;"><i class="fa fa-barcode" aria-hidden="true"></i> {{trans('navigation.generate_barcode')}}</a></li>
            </li>
        </ul>
    </div>
  </div>
</nav>
