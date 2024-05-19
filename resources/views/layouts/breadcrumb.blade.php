<section class="content-header" style="z-index: 100;">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <div class="row">
                  <div class="col-sm-12">
                      <ol class="breadcrumb float-sm-right" style="margin-top: 15px;">
                          @foreach ($breadcrumb->list as $key => $value)
                              <li class="breadcrumb-item {{ $key == count($breadcrumb->list) - 1 ? 'active' : '' }}" aria-current="page">{{ $value }}</li>
                              @if ($key < count($breadcrumb->list) - 1)
                                  <li class="breadcrumb-separator">/</li> 
                              @endif
                          @endforeach
                      </ol>
                  </div>
              </div>
              <div class="col-sm-6">
                  <h1>{{ $breadcrumb->title }}</h1>
              </div>
          </div>
      </div>
  </div>
</section>
