@extends('layouts.admin')

@section('content')

<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Orders</div>
                                    <h4>{{ $dashboardData[0]->Total ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Amount</div>
                                    <h4>tk{{ number_format($dashboardData[0]->TotalAmount ?? 0, 2) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Pending Orders</div>
                                    <h4>{{ $dashboardData[0]->TotalOrdered ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Pending Orders Amount</div>
                                    <h4>tk{{ number_format($dashboardData[0]->TotalOrderedAmount ?? 0, 2) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Delivered Orders</div>
                                    <h4>{{ $dashboardData[0]->TotalDelivered ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Delivered Orders Amount</div>
                                    <h4>tk{{ number_format($dashboardData[0]->TotalDeliveredAmount ?? 0, 2) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Canceled Orders</div>
                                    <h4>{{ $dashboardData[0]->TotalCanceled ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Canceled Orders Amount</div>
                                    <h4>tk{{ number_format($dashboardData[0]->TotalCanceledAmount ?? 0, 2) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Monthly revenue</h5>
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Total</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>tk{{ number_format($TotalAmount ?? 0, 2) }}</h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Order</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>tk{{ number_format($TotalOrderedAmount ?? 0, 2) }}</h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t3"></div>
                                <div class="text-tiny">Deliver</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>tk{{ number_format($TotalDeliveredAmount ?? 0, 2) }}</h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t4"></div>
                                <div class="text-tiny">Cancel</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>tk{{ number_format($TotalCanceledAmount ?? 0, 2) }}</h4>
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Recent orders</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="{{ route('admin.orders') }}">
                            <span class="view-all">View all</span>
                        </a>
                    </div>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:70px">OrderNo</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Tax</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Total Items</th>
                                    <th class="text-center">Delivered On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td class="text-center">{{ $order->user->name ?? 'Guest' }}</td>
                                    <td class="text-center">{{ $order->phone }}</td>
                                    <td class="text-center">tk{{ number_format($order->subtotal, 2) }}</td>
                                    <td class="text-center">tk{{ number_format($order->tax, 2) }}</td>
                                    <td class="text-center">tk{{ number_format($order->total, 2) }}</td>
                                    <td class="text-center">
                                        <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                                    </td>
                                    <td class="text-center">{{ $order->created_at->format('M d, Y') }}</td>
                                    {{-- <td class="text-center">{{ $order->orderItems->count() }}</td> --}}
                                    <td class="text-center">{{ $order->orderItems ? $order->orderItems->count() : 0 }}</td>
                                    <td class="text-center">
                                        @if($order->status == 'delivered')
                                            {{ $order->delivered_date->format('M d, Y') }}
                                        @elseif($order->status == 'canceled')
                                            {{ $order->canceled_date->format('M d, Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.order.details', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">No orders found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var options = {
        chart: {
            type: 'line',
            height: 350
        },
        series: [{
            name: 'Total',
            data: [{{ $AmountM }}]
        },{
            name: 'Ordered',
            data: [{{ $OrderAmountM }}]
        },{
            name: 'Delivered',
            data: [{{ $DeliveredAmountM }}]
        },{
            name: 'Canceled',
            data: [{{ $CanceledAmount }}]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        colors: ['#3b82f6', '#10b981', '#6366f1', '#ef4444'],
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return '$' + value.toFixed(2);
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#line-chart-8"), options);
    chart.render();
});
</script>
<style>
.status-badge {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    display: inline-block;
    min-width: 80px;
    text-align: center;
}
.status-ordered { background: #fff3cd; color: #856404; }
.status-delivered { background: #d4edda; color: #155724; }
.status-canceled { background: #f8d7da; color: #721c24; }
.dot {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 6px;
}
.t1 { background: #3b82f6; }
.t2 { background: #10b981; }
.t3 { background: #6366f1; }
.t4 { background: #ef4444; }
</style>
@endpush
