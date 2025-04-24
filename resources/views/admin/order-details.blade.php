{{-- @extends('layouts.admin')
@section('content')
<style>
    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;
    }
</style>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Order Details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Order Items</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <h5>Ordered Items</h5>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.orders') }}">Back</a>
            </div>

            <div class="table-responsive">
                @if(Session::has('status'))
                    <p class="alert alert-success text-center"> {{ Session::get('status') }} </p>
                @endif
                <table class="table table-striped table-bordered">
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


            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
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
                                    <img src="{{ asset('uploads/products/thumbnails') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}" class="image">
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
                                <a href="{{ route('home.shop.details', $item->product->slug) }}"
                                   target="_blank"
                                   class="btn p-0"
                                   style="width: 36px; height: 36px;"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="View Product Details">
                                    <i class="icon-eye d-flex align-items-center justify-content-center"
                                       style="font-size: 18px; width: 100%; height: 100%;"></i>
                                </a>
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

        <div class="wg-box mt-5">
            <h5>Update Order Status</h5>
            <form action="{{ route('admin.update.order.status') }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="select">
                            <select name="order_status" id="order_status">
                                <option value="ordered" {{ $order->status=='ordered' ? "selected" : "" }}>Ordered</option>
                                <option value="delivered" {{ $order->status=='delivered' ? "selected" : "" }}>Delivered</option>
                                <option value="canceled" {{ $order->status=='canceled' ? "selected" : "" }}>Canceled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success tf-button w208">Update Status</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection --}}



{{-- ======================================================================= --}}

@extends('layouts.admin')
@section('content')
<style>
    /* Base font size increased */
    body {
        font-size: 14px;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;
    }

    .product-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
    }

    .order-summary-card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    /* Increased text sizes */
    .summary-table th {
        width: 20%;
        font-weight: 600;
        font-size: 15px !important;  /* Increased from 14px */
        padding: 12px 8px;
    }

    .summary-table td {
        font-size: 14px !important;  /* Minimum 12px */
        padding: 10px 8px;
    }

    .section-title {
        font-size: 18px !important;  /* Increased from 16px */
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .address-card, .payment-card {
        background: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        font-size: 14px !important;
    }

    .status-badge {
        font-size: 14px !important;  /* Minimum 12px */
        padding: 6px 12px;
    }

    /* Ordered items table improvements */
    .ordered-items-table {
        font-size: 14px !important;  /* Base size increased */
    }

    .ordered-items-table th {
        font-size: 15px !important;
        font-weight: 600;
        padding: 12px 8px;
    }

    .ordered-items-table td {
        padding: 10px 8px !important;  /* Increased padding */
        vertical-align: middle;
        font-size: 14px !important;
    }

    .ordered-items-table .product-name {
        font-size: 15px !important;
        font-weight: 500;
    }

    .ordered-items-table .price {
        font-weight: 600;
        font-size: 14px !important;
    }

    /* Larger eye button */
    .eye-btn {
        font-size: 16px !important;  /* Increased from 14px */
        width: 40px !important;
        height: 40px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Form elements */
    .form-select, .form-control, .btn {
        font-size: 14px !important;
    }

    /* Breadcrumbs */
    .breadcrumbs li, .breadcrumbs a {
        font-size: 14px !important;
    }

    /* Alert messages */
    .alert {
        font-size: 14px !important;
    }

    /* Pagination */
    .pagination .page-link {
        font-size: 14px !important;
    }
</style>

<div class="main-content-inner">
    <div class="main-content-wrap">
        <!-- Breadcrumb and header -->
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3 class="text-2xl font-semibold text-gray-800">Order #{{ $order->id }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Dashboard</a></li>
                <li><i class="icon-chevron-right text-gray-400"></i></li>
                <li><a href="{{ route('admin.orders') }}" class="text-sm text-blue-600 hover:text-blue-800">Orders</a></li>
                <li><i class="icon-chevron-right text-gray-400"></i></li>
                <li class="text-sm text-gray-600">Details</li>
            </ul>
        </div>

        <!-- Order Summary Section -->
        <div class="wg-box order-summary-card mb-6">
            <div class="flex items-center justify-between mb-4">
                <h5 class="section-title">Order Summary</h5>
                <a class="tf-button style-1 w-auto px-4 py-2" href="{{ route('admin.orders') }}">
                    <i class="icon-arrow-left mr-2"></i> Back to Orders
                </a>
            </div>

            @if(Session::has('status'))
                <div class="alert alert-success mb-4">{{ Session::get('status') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table summary-table">
                    <tbody>
                        <tr>
                            <th>Order Number</th>
                            <td class="font-medium">#{{ $order->id }}</td>
                            <th>Contact Number</th>
                            <td>{{ $order->phone }}</td>
                            <th>Zip Code</th>
                            <td>{{ $order->zip }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at->format('M j, Y \a\t g:i A') }}</td>
                            <th>Delivery Date</th>
                            <td>{{ $order->delivered_date ? $order->delivered_date->format('M j, Y') : 'Pending' }}</td>
                            <th>Cancellation Date</th>
                            <td>{{ $order->canceled_date ? $order->canceled_date->format('M j, Y') : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td colspan="5">
                                <span class="status-badge
                                    @if($order->status=='delivered') bg-success
                                    @elseif($order->status=='canceled') bg-danger
                                    @else bg-warning
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ordered Items Section -->
        <div class="wg-box mb-6">
            <h5 class="section-title">Ordered Items ({{ $orderItems->count() }})</h5>

            <div class="table-responsive">
                <table class="table table-striped ordered-items-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Qty</th>
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
                            <td class="product-name">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ asset('uploads/products/thumbnails/'.$item->product->image) }}"
                                             alt="{{ $item->product->name }}"
                                             class="product-image rounded">
                                    </div>
                                    <div>
                                        {{ $item->product->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-center price">tk{{ number_format($item->price, 2) }}</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-center">{{ $item->product->SKU }}</td>
                            <td class="text-center">{{ $item->product->category->name ?? '-' }}</td>
                            <td class="text-center">{{ $item->product->brand->name ?? '-' }}</td>
                            <td class="text-center">{{ $item->options ?: '-' }}</td>
                            <td class="text-center">
                                @if($item->rstatus == 1)
                                    <span class="badge bg-info">Return Requested</span>
                                @else
                                    <span class="badge bg-secondary">No Return</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('home.shop.details', $item->product->slug) }}"
                                   target="_blank"
                                   class="btn p-0"
                                   style="width: 36px; height: 36px;"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="View Product Details">
                                    <i class="icon-eye d-flex align-items-center justify-content-center"
                                       style="font-size: 18px; width: 100%; height: 100%;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $orderItems->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Shipping and Payment Section -->
        <div class="row">
            <!-- Shipping Address -->
            <div class="col-md-6 mb-4">
                <div class="wg-box address-card h-100">
                    <h5 class="section-title">Shipping Address</h5>
                    <div class="space-y-2">
                        <p class="font-medium">{{ $order->name }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->locality }}</p>
                        <p>{{ $order->city }}, {{ $order->country }}</p>
                        <p>Landmark: {{ $order->landmark ?: 'None' }}</p>
                        <p>ZIP: {{ $order->zip }}</p>
                        <p class="mt-3"><i class="icon-phone mr-2"></i> {{ $order->phone }}</p>
                    </div>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="col-md-6 mb-4">
                <div class="wg-box payment-card h-100">
                    <h5 class="section-title">Payment Details</h5>
                    <table class="table">
                        <tr>
                            <th>Subtotal</th>
                            <td class="text-right">tk{{ number_format($order->subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Tax</th>
                            <td class="text-right">tk{{ number_format($order->tax, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td class="text-right">tk{{ number_format($order->discount, 2) }}</td>
                        </tr>
                        <tr class="font-semibold">
                            <th>Total Amount</th>
                            <td class="text-right">tk{{ number_format($order->total, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td class="text-right">{{ ucfirst($transaction->mode) }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td class="text-right">
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
                    </table>
                </div>
            </div>
        </div>

        <!-- Order Status Update -->
        <div class="wg-box mt-4">
            <h5 class="section-title">Update Order Status</h5>
            <form action="{{ route('admin.update.order.status') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <select name="order_status" id="order_status" class="form-select">
                            <option value="ordered" {{ $order->status=='ordered' ? 'selected' : '' }}>Ordered</option>
                            <option value="delivered" {{ $order->status=='delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="canceled" {{ $order->status=='canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success w-full">
                            <i class="icon-check-circle mr-2"></i> Update Status
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
