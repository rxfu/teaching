@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑部门 {{ $department->name }} 信息</div>
				<div class="panel-body">
					{{ Form::open(array('action' => array('DepartmentController@postUpdate', $department->id), 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('collected', '启用填报', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('collected', '1', (($department->collected == 1) ? true : false)) }}&nbsp;启用
								</label>
								<label class="radio-inline">
									{{ Form::radio('collected', '0', (($department->collected == 0) ? true : false)) }}&nbsp;禁用
								</label>
							</div>
							<div class="form-group">
								{{ Form::label('description', '部门描述', array('class' => 'control-label')) }}
								{{ Form::textarea('description', strip_tags($department->description), array('class' => 'form-control')) }}
							</div>														
							<div class="form-group">
								{{ Form::label('collector', '是否填报部门', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('collector', '1', (($department->collector == 1) ? true : false)) }}&nbsp;是
								</label>
								<label class="radio-inline">
									{{ Form::radio('collector', '0', (($department->collector == 0) ? true : false)) }}&nbsp;否
								</label>
							</div>														
							<div class="form-group">
								{{ Form::label('marker', '是否审核部门', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('marker', '1', (($department->marker == 1) ? true : false)) }}&nbsp;是
								</label>
								<label class="radio-inline">
									{{ Form::radio('marker', '0', (($department->marker == 0) ? true : false)) }}&nbsp;否
								</label>
							</div>		
							{{ Form::button('更新', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop