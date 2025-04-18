@if(isset($product))
    @php($overallRating = getOverallRating($product->reviews))
    <div class="flash_deal_product get-view-by-onclick" data-link="{{ route('product',$product->slug) }}">
        @if(getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
            <span class="for-discount-value p-1 pl-2 pr-2 font-bold fs-13">
                <span class="direction-ltr d-block">
                    -{{ getProductPriceByType(product: $product, type: 'discount', result: 'string') }}
                </span>
            </span>
        @endif
        <div class=" d-flex">
            <div class="d-flex align-items-center justify-content-center p-12px">
                <div class="flash-deals-background-image">
                    <img class="__img-125px" alt="" src="{{ getStorageImages(path: $product->thumbnail_full_url, type: 'product') }}">
                </div>
            </div>
            <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                <div>
                    <h3 class="mb-0 letter-spacing-0">
                        <a href="{{route('product',$product->slug)}}"
                           class="flash-product-title text-capitalize fw-semibold">
                            {{ Str::limit($product['name'], 80) }}
                        </a>
                    </h3>
                    @if($overallRating[0] != 0 )
                        <div class="flash-product-review">
                            @for($inc=1;$inc<=5;$inc++)
                                @if ($inc <= (int)$overallRating[0])
                                    <i class="tio-star text-warning"></i>
                                @elseif ($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0]))
                                    <i class="tio-star-half text-warning"></i>
                                @else
                                    <i class="tio-star-outlined text-warning"></i>
                                @endif
                            @endfor
                            <label class="badge-style2">
                                ( {{ count($product->reviews) }} )
                            </label>
                        </div>
                    @endif
                    <h4 class="d-flex flex-wrap gap-8 align-items-center row-gap-0 mb-0 letter-spacing-0">
                        @if(getProductPriceByType(product: $product, type: 'discount', result: 'value') > 0)
                            <del class="category-single-product-price">
                                {{ webCurrencyConverter(amount: $product->unit_price) }}
                            </del>
                        @endif
                        <span class="flash-product-price text-dark fw-semibold">
                            {{ getProductPriceByType(product: $product, type: 'discounted_unit_price', result: 'string') }}
                        </span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endif
