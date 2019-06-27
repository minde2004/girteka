@extends('admin/template')

@section('content')


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Vartotojo redagavimas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                {{  Form::open(array('action' => ['admin\UsersController@update', $id])) }}

              <div class="box-body">
                <div class="form-group @if($errors->has('name')) has-error @endif"><?php //$klaida="aaaa"; ?>
                  <label for="name">Vardas</label>
                  <input class="form-control" value="@if(null!==old('name')){{ old('name') }}@else{{ $user->name }}@endif" name="name" placeholder="Įveskite vardą" type="text">
				  <span class="help-block">{{$errors->first('name')}}</span>
                </div>
				<div class="form-group @if($errors->has('email')) has-error @endif"><?php //$klaida="aaaa"; ?>
                  <label for="email">El. paštas</label>
                  <input class="form-control" value="@if(null!==old('email')){{ old('email') }}@else{{ $user->email }}@endif" name="email" placeholder="Įveskite el. paštą" type="email">
				  <span class="help-block">{{$errors->first('email')}}</span>
                </div>
				<div class="form-group @if($errors->has('password')) has-error @endif"><?php //$klaida="aaaa"; ?>
                  <label for="password">Slaptažodis</label>
                  <input class="form-control" value="@if(null!==old('password')){{ old('password') }}@endif" name="password" placeholder="Įveskite slaptažodį" type="password">
				  <span class="help-block">{{$errors->first('password')}}</span>
                </div>
                
                <div class="form-group"><?php //$klaida="aaaa"; ?>
                  <label for="level">Lygis</label>
                  <select name="level" class="form-control">
					<option value="0" @if(null!==old('level') && old("level")=="0") selected @elseif($user->level=="0") selected @endif>Vartotojas</option>
					<option value="1" @if(null!==old('level') && old("level")=="1") selected @elseif($user->level=="1") selected @endif>Administratorius</option>
				  </select>
                </div>
				<div class="form-group"><?php //$klaida="aaaa"; ?>
				<div class="checkbox">
                  <label for="status">
				  <input name="status" type="checkbox" @if(null!==old('status') && old("status")==1) checked="true" @elseif($user->status=="1") checked="true" @endif />
				  Įjungti</label>
                </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
			  {{ Form::submit('Redaguoti', array('class' => 'btn btn-primary')) }}

              </div>
            {{ Form::close() }}
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div>

    </div>


    </section>
@endsection