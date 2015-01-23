@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加评分项目</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'MarkController@postSave', 'method' => 'post', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('seq', '项目序号', array('class' => 'control-label')) }}
								{{ Form::text('seq', Input::old('seq'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('name', '评分项目', array('class' => 'control-label')) }}
								{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('score', '分值', array('class' => 'control-label')) }}
								{{ Form::text('score', Input::old('score'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', '评分细则', array('class' => 'control-label')) }}
								{{ Form::textarea('description', Input::old('descrption'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('order', '项目排序', array('class' => 'control-label')) }}
								{{ Form::selectRange('order', 1, 999, Input::old('order'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('department', '审核部门', array('class' => 'control-label')) }}
								{{ Form::select('department', $department, Input::old('department'), array('class' => 'form-control')) }}
							</div>	
							<div class="form-group">
								{{ Form::label('activated', '启用标志', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('activated', '1', true) }}&nbsp;启用
								</label>
								<label class="radio-inline">
									{{ Form::radio('activated', '0') }}&nbsp;禁用
								</label>
							</div>	
							<div class="form-group">
								{{ Form::label('memo', '备注', array('class' => 'control-label')) }}
								{{ Form::textarea('memo', Input::old('memo'), array('class' => 'form-control')) }}
							</div>
							{{ Form::button('添加', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop