<x-forms.input-grid col1="2" col2="6" label="Product Name" name="product_name" value="{{ $product->product_name ?? '' }}" placeholder="Masukan Product Name..."></x-forms.input-grid>
<x-forms.input-grid col1="2" col2="6" label="Product Description" name="product_description" value="{{ $product->product_description ?? '' }}" placeholder="Masukan Product Description..."></x-forms.input-grid>
<x-forms.input-grid col1="2" col2="6" label="product price capital" name="product_price_capital" value="{{ $product->product_price_capital ?? '' }}" placeholder="Masukan product price capital..."></x-forms.input-grid>
<x-forms.input-grid col1="2" col2="6" label="product price sell" name="product_price_sell" value="{{ $product->product_price_sell ?? '' }}" placeholder="Masukan product price sell..."></x-forms.input-grid>

@push('script')
<script src="{{ asset('assets/js/apps/user.js?v=' . random_string(6)) }}"></script>
@endpush
