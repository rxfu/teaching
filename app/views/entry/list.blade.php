@extends('master')

@section('content')
	@foreach ($indexdatas as $indexdata)
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>{{ $indexdata->index->seq . '. ' . $indexdata->index->name }}</h4>
					</div>
					<div class="panel-body">
						{{ Form::open(array('action' => array('IndexdataController@postUpdate', $indexdata->id), 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal')) }}
							<div class="form-group">
								{{ Form::label('entry' . $indexdata->id, '填报内容', array('class' => 'col-md-2 control-label')) }}
								<div class="col-md-10">
									@if ($indexdata->index->type == 'text')
										{{ Form::text('entry' . $indexdata->id, $indexdata->data, array('class' => 'form-control', 'placeholder' => '填报内容')) }}
									@elseif ($indexdata->index->type == 'textarea')
										{{ Form::textarea('entry' . $indexdata->id, strip_tags($indexdata->data), array('class' => 'form-control', 'placeholder' => '填报内容')) }}
									@endif
								</div>
							</div>
						{{ Form::close() }}
						@if ($indexdata->index->has_file == 1)
							@if ($indexdata->filename == null)
								{{ Form::open(array('action' => array('IndexdataController@postUpload', $indexdata->id), 'method' => 'put', 'files' => true, 'role' => 'form', 'class' => 'form-horizontal')) }}
									<div class="form-group">
										{{ Form::label('file' . $indexdata->id, '附件', array('class' => 'col-md-2 control-label')) }}
										<div class="col-md-8">
											{{ Form::file('file' . $indexdata->id, array('class' => 'form-control')) }}
										</div>							
										<div class="col-md-2">
											{{ Form::button('上传', array('type' => 'submit', 'class' =>'btn btn-success btn-block')) }}
										</div>
									</div>
								{{ Form::close() }}
							@else
								{{ Form::open(array('action' => array('IndexdataController@postDeleteFile', $indexdata->id), 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal')) }}
									<div class="form-group">
										{{ Form::label('file', '附件', array('class' => 'col-md-2 control-label')) }}
										<div class="col-md-2">
											<a href="{{ URL::route('entry.download', $indexdata->id) }}" role="button" class="btn btn-info">下载附件</a>
										</div>
										<div class="col-md-2">
											{{ Form::button('删除附件', array('type' => 'button', 'class' => 'btn btn-danger', 'title' => '删除', 'data-toggle' => 'modal', 'data-target' => '#dialogConfirm')) }}
										</div>
									</div>
								{{ Form::close() }}
							@endif
						@endif
					</div>
					@if (!empty($indexdata->index->description))
						<div class="panel-footer">
							<strong>填报说明：</strong>{{ $indexdata->index->description }}
						</div>
					@endif
				</div>
			</div>
		</div>
	@endforeach

	@include('delete_confirm')
@stop