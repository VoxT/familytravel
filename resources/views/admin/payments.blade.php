@extends('admin.master')

@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('content')
<div class="right_col" role="main" style="min-height: 800px;">
	<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Default Example <small>Users</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h2>Danh sách thanh toán </h2>
            <table id="datatable" class="table table-striped table-bordered datatable">
              <thead>
                <tr>
                  <th>Tên người dùng</th>
                  <th>Tên người thanh toán</th>
                  <th>Email thanh toán</th>
                  <th>Tổng tiền</th>
                  <th>Đơn vị tiền tệ</th>
                  <th>Ngày thanh toán</th>
                </tr>
              </thead>

             
              <tbody>
               @foreach ($data as $value)
                <tr>
                  <td><a href="users/{{$value['user_id']}}" style="color: blue">{{$value['user_name']}}</a></td>
                  <td>{{$value['payment']->payer_name}}</td>
                  <td>{{$value['payment']->payer_email}}</td>
                  <td>{{$value['payment']->amount_total}}</td>
                  <td>{{$value['payment']->amount_currency}}</td>
                  <td>{{$value['payment']->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

	</div>
</div>
@endsection