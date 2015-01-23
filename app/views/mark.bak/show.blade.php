@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">评分项目 {{ $mark->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">项目序号：</th>
							<td class="col-md-8 text-left">{{ $mark->seq }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">评分项目：</th>
							<td class="col-md-8 text-left">{{ $mark->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">分值：</th>
							<td class="col-md-8 text-left">{{ $mark->score }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">评分细则：</th>
							<td class="col-md-8 text-left">{{ $mark->description }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">项目排序：</th>
							<td class="col-md-8 text-left">{{ $mark->order }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">审核部门：</th>
							<td class="col-md-8 text-left">{{ $mark->department->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否启用：</th>
							<td class="col-md-8 text-left">{{ $mark->activated ? '已启用' : '未启用' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">备注：</th>
							<td class="col-md-8 text-left">{{ $mark->memo }}</td>
						</tr>
					</table>
					{{ HTML::linkRoute('mark.edit', '编辑', array($mark->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop