@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">系统设置</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'SystemController@postUpdate', 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('website_name', '网站名称', array('class' => 'control-label')) }}
								{{ Form::text('website_name', $system->website_name, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('introduction', '网站介绍', array('class' => 'control-label')) }}
								{{ Form::textarea('introduction', strip_tags($system->introduction), array('class' => 'form-control')) }}
							</div>
							<!-- <div class="form-group">
								{{ Form::label('maintained', '维护状态', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('maintained', '1', (($system->maintained == 1) ? true : false)) }}&nbsp;是
								</label>
								<label class="radio-inline">
									{{ Form::radio('maintained', '0', (($system->maintained == 0) ? true : false)) }}&nbsp;否
								</label>
							</div> -->
							{{ Form::button('设置', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop