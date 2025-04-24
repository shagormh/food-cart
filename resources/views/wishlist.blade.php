@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
        @if(Cart::instance('wishlist')->content()->count()>0)
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="{{ asset('uploads/products/thumbnails') }}/{{ $item->model->image }}" width="120" height="120" alt="" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4>{{ $item->name }}</h4>
                  {{--   <ul class="shopping-cart__product-item__options">
                      <li>Color: Yellow</li>
                      <li>Size: L</li>
                    </ul> --}}
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">tk{{ $item->price }}</span>
                </td>
                <td>
                  {{-- <div class="qty-control position-relative">
                    <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="qty-control__number text-center">
                    <div class="qty-control__reduce">-</div>
                    <div class="qty-control__increase">+</div>
                  </div><!-- .qty-control --> --}}
                  {{ $item->qty }}
                </td>
                <td>
                  <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('wishlist.move.to.cart', $item->rowId) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning">Move to Cart</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('wishlist.item.remove',$item->rowId) }}" method="post" id="wishlist-item-delete-{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:void(0)" class="remove-cart" onclick="document.getElementById('wishlist-item-delete-{{ $item->id }}').submit()">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                            <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                            </svg>
                        </a>
                        </form>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="cart-table-footer">
            <form action="{{ route('wishlist.clear') }}" class="position-relative bg-body" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light">CLEAR WISHLIST</button>
            </form>
          </div>
        </div>
        @else
            <div class="col-md-12">
                <h4>No Item In This Wishlist</h4>
                <a href="{{ route('home.shop') }}" class="btn btn-info">Add to Wishlist</a>
            </div>
        @endif
      </div>
    </section>
  </main>
@endsection
