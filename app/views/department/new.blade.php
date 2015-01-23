@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加部门</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'DepartmentController@postSave', 'method' => 'post', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('name', '部门名称', array('class' => 'control-label')) }}
								{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => '部门名称')) }}
							</div>							
							<div class="form-group">
								{{ Form::label('collected', '启用填报', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('collected', '1') }}&nbsp;启用
								</label>
								<label class="radio-inline">
									{{ Form::radio('collected', '0', true) }}&nbsp;禁用
								</label>
							</div>							
							<div class="form-group">
								{{ Form::label('description', '部门描述', array('class' => 'control-label')) }}
								{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control', 'placeholder' => '部门描述')) }}
							</div>														
							<div class="form-group">
								{{ Form::label('collector', '是否填报部门', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('collector', '1', true) }}&nbsp;是
								</label>
								<label class="radio-inline">
									{{ Form::radio('collector', '0') }}&nbsp;否
								</label>
							</div>														
							<div class="form-group">
								{{ Form::label('marker', '是否审核部门', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('marker', '1', true) }}&nbsp;是
								</label>
								<label class="radio-inline">
									{{ Form::radio('marker', '0') }}&nbsp;否
								</label>
							</div>		
							{{ Form::button('添加', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop