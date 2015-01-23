@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ URL::route('department.new') }}" class="btn btn-success" role="button" title="添加部门"><i class="fa fa-plus fa-fw"></i>添加部门</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="department-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>部门名称</th>
									<th class="yesno">启用填报</th>
									<th class="nosort">部门描述</th>
									<th class="yesno">是否填报部门</th>
									<th class="yesno">是否审核部门</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($departments as $department)
									<tr>
										<td>{{ $department->name }}</td>
										<td>{{ $department->collected }}</td>
										<td>{{ $department->description }}</td>
										<td>{{ $department->collector }}</td>
										<td>{{ $department->marker }}</td>
										<td><a href="{{ URL::route('department.show', $department->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ URL::route('department.edit', $department->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('DepartmentController@postDestroy', $department->id), 'method' => 'delete', 'role' => 'form')) }}
											{{ Form::button('<i class="fa fa-trash-o fa-fw"></i>', array('type' => 'button', 'class' => 'btn btn-danger', 'title' => '删除', 'data-toggle' => 'modal', 'data-target' => '#dialogConfirm')) }}
											{{ Form::close() }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('delete_confirm');
@stop