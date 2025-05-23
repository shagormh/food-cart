@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All Products</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">All Products</div></li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." name="name" tabindex="2" required>
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.product.add') }}">
                    <i class="icon-plus"></i>Add new
                </a>
            </div>

            <div class="table-responsive">
                @if(Session::has('status'))
                    <p class="alert alert-success text-center">{{ Session::get('status') }}</p>
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Featured</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td class="pname">
                                <div class="image">
                                    @if($product->image)
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->image) }}" alt="Product Image" class="image">
                                    @else
                                        <img src="{{ asset('uploads/products/thumbnails/default.png') }}" alt="No Image" class="image">
                                    @endif
                                </div>
                                <div class="name">
                                    <a href="{{ route('home.shop.details', $product->slug) }}" target= "_blank" class="body-title-2">{{ $product->name }}</a>
                                    <div class="text-tiny mt-3">{{ $product->slug }}</div>
                                </div>
                            </td>
                            <td>tk{{ number_format($product->regular_price, 2) }}</td>
                            <td>tk{{ number_format($product->sale_price ?? 0, 2) }}</td>
                            <td>{{ $product->SKU }}</td>
                            <td>{{ $product->category?->name ?? 'No Category' }}</td>
                            <td>{{ $product->brand?->name ?? 'No Brand' }}</td>
                            <td>{{ $product->featured ? "YES" : "NO" }}</td>
                            <td>{{ ucfirst($product->stock_status) }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{ route('home.shop.details', $product->slug) }}" target="_blank">
                                        <div class="item eye"><i class="icon-eye"></i></div>
                                    </a>
                                    <a href="{{ route('admin.product.edit', $product->id) }}">
                                        <div class="item edit"><i class="icon-edit-3"></i></div>
                                    </a>
                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item text-danger delete-btn">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function(){
        $('.delete-btn').on('click', function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "Are You Sure?",
                text: "You want to delete this item?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            }).then(function(willDelete){
                if(willDelete){
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
