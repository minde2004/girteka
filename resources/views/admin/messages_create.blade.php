@extends('admin/template')

@section('content')


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Naujo pranešimo sukūrimas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                {{  Form::open(array('action' => 'admin\MessagesController@store')) }}

              <div class="box-body">
				<div class="form-group @if($errors->has('title')) has-error @endif"><?php //$klaida="aaaa"; ?>
                  <label for="title">Pavadinimas</label>
                  <input class="form-control" value="@if(null!==old('title')){{ old('title') }}@endif" name="title" placeholder="Pavadinimas" type="text">
				  <span class="help-block">{{$errors->first('title')}}</span>
                </div>
                <div class="form-group @if($errors->has('text')) has-error @endif"><?php //$klaida="aaaa"; ?>
                  <label for="text">Pranešimas</label>
                  <input class="form-control" value="@if(null!==old('text')){{ old('text') }}@endif" name="text" placeholder="Pranešimas" type="text">
				  <span class="help-block">{{$errors->first('text')}}</span>
                </div>
				<div class="form-group @if($errors->has('status')) has-error @endif"><?php //$klaida="aaaa"; ?>
                  <label for="status">Siuntimo tipas</label><br/>
				  <label>
                  <input class="minimal-blue" value="0" @if(null!==old('status')) @if(old('status')==='0'){{ "checked" }} @endif @else {{ "checked" }} @endif name="status" type="radio">
				  Siųsti visiems
				  </label>
				  <label>
                  <input class="minimal-blue" value="1" @if(null!==old('status') && old('status')==='1') {{ "checked" }} @endif name="status" type="radio">
				  Siųsti pasirinktinai
				  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
			  {{ Form::submit('Sukurti ir išsiūsti', array('class' => 'btn btn-primary')) }}

              </div>
            {{ Form::close() }}
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div>


    </section>
@endsection