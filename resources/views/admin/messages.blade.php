@extends('admin/template')

@section('content')


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pranešimų sąrašas</h3>

              <div class="box-tools">
{{  Form::open(array('action' => 'admin\MessagesController@search')) }}
                <div class="input-group input-group-sm" style="width: 200px;">
				 <div class="input-group-btn"><a href="/admin/messages/create" class="btn btn-success pull-left"><i class="fa fa-plus"></i></a></div>
				 
                  <input style="width: 120px;" type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
				  
                </div>{{ Form::close() }}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Pranešimas</th>
                  <th>Siuntimo tipas</th>
                  <th></th>
                </tr>
				@foreach($messages as $message)
					<tr id="user_{{ $message->id }}">
						<td>{{ $message->id }}</td>
						<td>{{ $message->text }}</td>
						@if($message->status)
							<td class="on_off"><span class="label label-success">Visiems</span></td>
						@else
							<td class="on_off"><span class="label label-danger">Pasirinktinis</span></td>
						@endif
						<td>
							<div class="btn-group">
                  <a href="/admin/messages/{{ $message->id }}/edit" type="button" class="btn btn-primary">Redaguoti</a>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/admin/messages/{{ $message->id }}/edit">Redaguoti</a></li>
					<li><a class="on_off" onclick="on_off('{{ $message->id }}');" >Pakartoti siuntimą</a></li>
                  </ul>
                </div>
						</td>
					</tr>
				@endforeach

                <tr>
                  <th>ID</th>
                  <th>Pranešimas</th>
                  <th>Siuntimo tipas</th>
                  <th></th>
                </tr>
              </tbody>
			  
			  </table>
            </div>
			<div class="box-footer clearfix">
			{{ $messages->links() }}
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>


    </section>
	<script>
         function on_off(id){
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/admin/users/on_off') }}",
                  method: 'post',
                  data: {
                     'id': id
                  },
                  success: function(result){
					  res = JSON.parse(result);
                     if(res.status){
						 $("#user_"+res.id+" td.on_off").html('<span class="label label-success">Aktyvus</span>');
						 $("#user_"+res.id+" a.on_off").html('Išjungti');
					 } else {
						 $("#user_"+res.id+" td.on_off").html('<span class="label label-danger">Išjungtas</span>');
						 $("#user_"+res.id+" a.on_off").html('Įjungti');
					 }
                  }});
               };

</script>
@endsection