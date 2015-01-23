@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ URL::route('user.new') }}" class="btn btn-success" role="button" title="添加用户"><i class="fa fa-plus fa-fw"></i>添加用户</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="user-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>用户名</th>
									<th>所在部门</th>
									<th>所属组</th>
									<th>Email</th>
									<th class="yesno">是否启用</th>
									<th>最后登录时间</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $user->username }}</td>
										<td>{{ $user->department->name }}</td>
										<td>{{ $user->groups[0]->name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->activated }}</td>
										<td>{{ $user->login_at }}</td>
										<td><a href="{{ URL::route('user.show', $user->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('UserController@postResetPassword', $user->id), 'method' => 'put', 'role' => 'form')) }}
											{{ Form::button('<i class="fa fa-random fa-fw"></i>', array('type' => 'submit', 'class' => 'btn btn-warning', 'title' => '重置密码')) }}
											{{ Form::close() }}
										</td>
										<td><a href="{{ URL::route('user.edit', $user->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('UserController@postDestroy', $user->id), 'method' => 'delete', 'role' => 'form')) }}
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

	@include('delete_confirm')
@stop