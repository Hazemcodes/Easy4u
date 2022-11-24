<div>
<style>
/*     #pp{
        height: 0% !important;
    }
    #id{
        left: 0% !important;;
    } */
</style>
    <!-- All products -->
    <div id="pp"  class="row isotope-grid">
        @for ($i = 0; $i < count($products); $i++)
            @if ($products[$i]->exists())
                @php
                    $productid = $products[$i]->id;
                    $categoryid = $categoryProduct->where('product_id','=',$productid)->first()->category_id;
                    $categorytitle = $category->where('id','=',$categoryid)->first()->title;
                @endphp
            
                <div id="change" class="col-sm-6 col-md-6 col-lg-3 p-b-35 isotope-item {{$categorytitle}}" >
                    <!-- Block2 --> 
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <div class="wrapper">
                                <div class="content">
                                    <img style="height: 250px; width: 250px;" src={{asset("public/assets/images/".$products[$i]->photo)}} alt="IMG-PRODUCT">
                                    @if ($data->type == 'seller' || $data->type == 'admin')
                                        <a href="{{url('delete-prod/'.$products[$i]->id)}}"><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size: 20px;"></i></a>
                                        @if ($data->type == 'seller')
                                            <a href="{{url('edit-prod/'.$products[$i]->id)}}" style=" margin-right: 12%;"><i class="fa fa-edit" aria-hidden="true" style="color: #6c7ae0;font-size: 20px;"></i></a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" onclick="popupCard({{$products[$i]}})">
                                Quick View
                            </button>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a id="gettitle" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" href="{{route('product_detail', [$products[$i]->id,$products[$i]->name])}}">
                                    {{$products[$i]->name }}
                                </a>
                                <span id="getprice" class="stext-105 cl3">
                                    {{$products[$i]->price }} $
                                </span>
                            </div>
                            
                            <div style="display: none;">
                                <span id="getdes">{{$products[$i]->description }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
            
{{--         @if ($data->type == 'seller')
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-20 p-t-20 isotope-item" style="background-color: rgb(248, 248, 248) ">
            <div class="block2-pic hov-img0 m-l-20 m-r-20">
                <a href="addNewProduct">
                    <img style="margin-left:auto; margin-right: auto;" src={{asset('public/assets/images/icons/plus.png')}} alt="add new item">
                </a>
            </div>
        </div>
        @endif --}}

    </div>
    @if ($products->hasMorePages())
    <div class="flex-c-m flex-w w-full p-t-45" >
        <button class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" wire:click.prevent="loadMore"> load more</button>
    </div>
    @endif

</div>