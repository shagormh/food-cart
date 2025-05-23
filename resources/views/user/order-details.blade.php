@extends('layouts.app')

@section('content')
<style>
    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;
    }
    .pt-90 {
      padding-top: 90px !important;
    }

    .pr-6px {
      padding-right: 6px;
      text-transform: uppercase;
    }

    .my-account .page-title {
      font-size: 1.5rem;
      font-weight: 700;
      text-transform: uppercase;
      margin-bottom: 40px;
      border-bottom: 1px solid;
      padding-bottom: 13px;
    }

    .my-account .wg-box {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      padding: 24px;
      flex-direction: column;
      gap: 24px;
      border-radius: 12px;
      background: var(--White);
      box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
    }

    .bg-success {
      background-color: #40c710 !important;
    }

    .bg-danger {
      background-color: #f44032 !important;
    }

    .bg-warning {
      background-color: #f5d700 !important;
      color: #000;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
      --bs-table-accent-bg: #fff !important;

    }

    .table-transaction th,
    .table-transaction td {
      padding: 0.625rem 1.5rem .25rem !important;
      color: #000 !important;
    }

    .table> :not(caption)>tr>th {
      padding: 0.625rem 1.5rem .25rem !important;
      background-color: #6a6e51 !important;
    }

    .table-bordered>:not(caption)>*>* {
      border-width: inherit;
      line-height: 32px;
      font-size: 14px;
      border: 1px solid #e1e1e1;
      vertical-align: middle;
    }

    .table-striped .image {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      flex-shrink: 0;
      border-radius: 10px;
      overflow: hidden;
    }

    .table-striped td:nth-child(1) {
      min-width: 250px;
      padding-bottom: 7px;
    }

    .pname {
      display: flex;
      gap: 13px;
    }
    .pname .image img{
        width: 50px;
        height: 50px;

    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
      border-width: 1px 1px;
      border-color: #6a6e51;
    }
  </style>
  <main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Order Details</h3>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        @include('user.account-nav')
                    </div>

                    <div class="col-lg-12">
                        <div class="wg-box">
                            <div class="flex items-center justify-between gap10 flex-wrap">
                                <div class="wg-filter flex-grow">
                                    <h5>Ordered Items</h5>
                                </div>
                                <a class="tf-button style-1 w208 btn-sm btn-danger" href="{{ route('user.orders') }}">Back</a>
                            </div>

                            <div class="table-responsive">
                                @if(Session::has('status'))
                                    <p class="alert alert-success">{{ Session::get('status') }}</p>
                                @endif
                                <table class="table table-striped table-bordered table-transaction">
                                    <tr>
                                        <th>Order No</th>
                                        <td>{{ $order->id }}</td>
                                        <th>Mobile</th>
                                        <td>{{ $order->phone }}</td>
                                        <th>Zip</th>
                                        <td> {{ $order->zip }} </td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{ $order->created_at }}</td>
                                        <th>Delivery Date</th>
                                        <td>{{ $order->delivered_date }}</td>
                                        <th>Cancel Date</th>
                                        <td> {{ $order->canceled_date }} </td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td>
                                            @if($order->status=='delivered')
                                                <span class="badge bg-success">Delivered</span>
                                            @elseif($order->status=='canceled')
                                                <span class="badge bg-danger">Canceled</span>
                                            @else
                                                <span class="badge bg-warning">Ordered</span>
                                            @endif
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="divider"></div>
                            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                {{ $orderItems->links('pagination::bootstrap-5') }}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-transaction">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">SKU</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Brand</th>
                                            <th class="text-center">Options</th>
                                            <th class="text-center">Return Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $item)
                                        <tr>

                                            <td class="pname">
                                                <div class="image">
                                                    <img src="{{ asset('uploads/products/thumbnails') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}" class="image rounded">
                                                </div>
                                                <div class="name">
                                                    <a href="{{ route('home.shop.details',$item->product->slug) }}" target="_blank"
                                                        class="body-title-2">{{ $item->product->name }}</a>
                                                </div>
                                            </td>
                                            <td class="text-center">tk{{ $item->price }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">{{ $item->product->SKU }}</td>
                                            <td class="text-center">{{ $item->product->category->name }}</td>
                                            <td class="text-center">{{ $item->product->brand->name }}</td>
                                            <td class="text-center">{{ $item->options }}</td>
                                            <td class="text-center">{{ $item->rstatus=='0' ? 'NO':'YES' }}</td>
                                            <td class="text-center">
                                                <div class="list-icon-function view-icon">
                                                    <div class="item eye">
                                                        <i class="icon-eye"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="divider"></div>
                            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                {{ $orderItems->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                        <div class="wg-box mt-5">
                            <h5>Shipping Address</h5>
                            <div class="my-account__address-item col-md-6">
                                <div class="my-account__address-item__detail">
                                    <p>{{ $order->name }}</p>
                                    <p>{{ $order->address }}</p>
                                    <p>{{ $order->locality }}</p>
                                    <p>{{ $order->city }}, {{ $order->country }}</p>
                                    <p>{{ $order->landmark }}</p>
                                    <p>{{ $order->zip }}</p>
                                    <br>
                                    <p>Mobile : {{ $order->phone }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="wg-box mt-5">
                            <h5>Transactions</h5>
                            <table class="table table-striped table-bordered table-transaction">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>tk{{ $order->subtotal }}</td>
                                        <th>Tax</th>
                                        <td>tk{{ $order->tax }}</td>
                                        <th>Discount</th>
                                        <td>tk{{ $order->discount }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>tk{{ $order->total }}</td>
                                        <th>Payment Mode</th>
                                        <td>{{ $transaction->mode }}</td>
                                        <th>Status</th>
                                        <td>
                                            @if($transaction->status=='approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($transaction->status=='declined')
                                                <span class="badge bg-danger">Declined</span>
                                            @elseif($transaction->status=='refunded')
                                                <span class="badge bg-secondary">Refunded</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if($order->status=='ordered')
                        <div class="wg-box mt-5 text-right">
                            <form action="{{ route('user.order.cancel') }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="button" class="btn btn-danger cancel-order">Cancel Order</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection
@push('scripts')
<script>
    $(function(){
        $('.cancel-order').on('click',function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title : "Are You Sure ?",
                text : 'You Want to cancel this order ?',
                type : 'warning',
                buttons: ['No','Yes'],
                ConfirmButtonColor: '#dc3545',
            }).then(function(result){
                if(result){
                    form.submit();
                }
            });
        });
    })
</script>

@endpush
