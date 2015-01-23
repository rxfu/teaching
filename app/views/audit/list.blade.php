@extends('master')

@section('content')
	@foreach ($indexes as $index)
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>{{ $index->index->seq . '. ' . $index->index->name }}</h4>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="audit-table" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>填报部门</th>
										<th>填报内容</th>
										<th>附件</th>
										<th>是否审核</th>
										<th>是否通过</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($indexdatas as $indexdata)
										@if ($indexdata->index_id == $index->index_id)
											<tr>
												<td>{{ $indexdata->collector->name }}</td>
												<td>{{ $indexdata->data }}</td>
												<td>
													@if (! is_null($indexdata->filename))
														<a href="{{ URL::route('entry.download', $indexdata->id) }}" role="button" class="btn btn-info">下载</a>
													@endif
												</td>
												<td>
													{{ Form::open(array('action' => array('IndexdataController@postCheck', $indexdata->id), 'method' => 'put', 'role' => 'form')) }}
														<div class="checkbox">
															{{ Form::checkbox('checked' . $indexdata->id, 'passed' . $indexdata->id, $indexdata->checked ? true : false) }}
														</div>
													{{ Form::close() }}
												</td>
												<td>
													{{ Form::open(array('action' => array('IndexdataController@postPass', $indexdata->id), 'method' => 'put', 'role' => 'form')) }}
														<div class="checkbox">
															{{ Form::checkbox('passed' . $indexdata->id, 'checked' . $indexdata->id, $indexdata->passed ? true : false, array('disabled' => 'disabled')) }}
														</div>
													{{ Form::close() }}
												</td>
											</tr>
										@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>					
					@if (!empty($index->index->description))
						<div class="panel-footer">
							<strong>填报说明：</strong>{{ $index->index->description }}
						</div>
					@endif
				</div>
			</div>
		</div>
	@endforeach
@stop