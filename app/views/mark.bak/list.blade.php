@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ URL::route('mark.new') }}" class="btn btn-success" role="button" title="添加评分项目"><i class="fa fa-plus fa-fw"></i>添加评分项目</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="mark-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>项目序号</th>
									<th>评分项目</th>
									<th>分值</th>
									<th class="nosort">评分细则</th>
									<th>项目排序</th>
									<th>审核部门</th>
									<th class="yesno">是否启用</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($marks as $mark)
									<tr>
										<td>{{ $mark->seq }}</td>
										<td>{{ $mark->name }}</td>
										<td>{{ $mark->score }}</td>
										<td>{{ $mark->description }}</td>
										<td>{{ $mark->order }}</td>
										<td>{{ $mark->department->name }}</td>
										<td>{{ $mark->activated }}</td>
										<td><a href="{{ URL::route('mark.show', $mark->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ URL::route('mark.edit', $mark->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('MarkController@postDestroy', $mark->id), 'method' => 'delete', 'role' => 'form')) }}
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