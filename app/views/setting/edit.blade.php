@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">采集设置</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'SettingController@postUpdate', 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('year', '年度', array('class' => 'control-label')) }}
								{{ Form::text('year', $setting->year, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('opened', '开启状态', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('opened', '1', (($setting->opened == 1) ? true : false)) }}&nbsp;开启
								</label>
								<label class="radio-inline">
									{{ Form::radio('opened', '0', (($setting->opened == 0) ? true : false)) }}&nbsp;关闭
								</label>
							</div>
							<div class="form-group">
								{{ Form::label('collected', '填报状态', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('collected', '1', (($setting->collected == 1) ? true : false)) }}&nbsp;允许
								</label>
								<label class="radio-inline">
									{{ Form::radio('collected', '0', (($setting->collected == 0) ? true : false)) }}&nbsp;禁止
								</label>
							</div>
							<div class="form-group">
								{{ Form::label('marked', '审核状态', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('marked', '1', (($setting->marked == 1) ? true : false)) }}&nbsp;允许
								</label>
								<label class="radio-inline">
									{{ Form::radio('marked', '0', (($setting->marked == 0) ? true : false)) }}&nbsp;禁止
								</label>
							</div>
							<div class="form-group">
								<div class="col-md-4">
									{{ Form::button('设置', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
								</div>
								<div class="col-md-4">
									<a href="{{ URL::route('setting.init') }}" role="button" class="btn btn-lg btn-info btn-block" id="initSystem">初始化系统</a>
								</div>
								<div class="col-md-4">
									<a href="{{ URL::route('setting.clean') }}" role="button" class="btn btn-lg btn-danger btn-block" id="cleanSystem">清理系统</a>
								</div>
							</div>
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop