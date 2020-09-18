<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ (request()->route()->getPrefix()) ? ucwords(ltrim(request()->route()->getPrefix(),'/')) :ucwords(Route::currentRouteName()) }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ ucwords(Route::currentRouteName()) }}</a></li>
               
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>