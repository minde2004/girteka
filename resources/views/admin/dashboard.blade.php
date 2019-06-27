@extends('admin/template')

@section('content')


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $users }}</h3>

              <p>Registruotu vartotojų</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/users" class="small-box-footer">Vartotojų sąrašas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>


    </section>
@endsection