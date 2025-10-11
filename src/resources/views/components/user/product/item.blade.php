@props(['product'])

<div class="card w-50">
    <form class="api-action" action="{{ route('user.api.cart_item.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->price }}円</p>
            <button type="submit" class="btn btn-primary mt-3">+ カートに追加</button>
        </div>
    </form>
</div>