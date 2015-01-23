@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">部门 {{ $department->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">部门名称：</th>
							<td class="col-md-8 text-left">{{ $department->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">启用填报：</th>
							<td class="col-md-8 text-left">{{ $department->collected ? '已启用' : '未启用' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">部门描述：</th>
							<td class="col-md-8 text-left">{{ $department->description }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否填报部门：</th>
							<td class="col-md-8 text-left">{{ $department->collector ? '是' : '否' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否审核部门：</th>
							<td class="col-md-8 text-left">{{ $department->marker ? '是' : '否' }}</td>
						</tr>
					</table>
					{{ HTML::linkRoute('department.edit', '编辑', array($department->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop