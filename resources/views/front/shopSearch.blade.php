@extends('front.layouts.master')
@section('main-container')
    <form action="shop">
        <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Organi Shop</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
        <!-- Product Section Begin -->

        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">

                        <div class="sidebar">
                            <div class="sidebar__item">
                                <h4>Department</h4>
                                <ul>
                                    @foreach($brands as $value)
                                        <li>
                                            <div class="bc-item">
                                                <label for="bc-{{$value->id}}" style="display: block; width:70%">
                                                    {{$value->name}}
                                                    <input type="checkbox"
                                                           {{(request('brand')[$value->id] ?? '') == 'on'?'checked' : ''}}
                                                           id="bc-{{$value->id}}"
                                                           name="brand[{{$value->id}}]"
                                                           style="float: right; top: 7px;position: relative;"
                                                           onchange="this.form.submit();"
                                                    >
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar__item">
                                <h4>Price</h4>
                                <div class="price-range-wrap">
                                    <div
                                        class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                        data-min="0" data-max="50000000">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                        <span tabindex="0"
                                              class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0"
                                              class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div class="range-slider">
                                        <div class="price-input">
                                            <input type="text" id="minamount" name="minamount">
                                            <input type="text" id="maxamount" name="maxamount">
                                            <button onclick="this.form.submit()"> Lọc</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar__item">
                                <h4>Ram Size</h4>
                                @foreach($ramsizes as $value)
                                    <div class="sidebar__item__size">
                                        <label for="ram-{{$value->id}}"
                                               class="{{(request('ram')[$value->id] ?? '') == 'on'?'ram' : ''}}">
                                            {{$value->size}}
                                            <input type="checkbox"
                                                   {{(request('ram')[$value->id] ?? '') == 'on'?'checked' : ''}}
                                                   id="ram-{{$value->id}}"
                                                   name="ram[{{$value->id}}]"
                                                   onchange="this.form.submit();"
                                            >
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="sidebar__item">
                                <h4>Memories Size</h4>
                                @foreach($internalMemories as $value)
                                    <div class="sidebar__item__size">
                                        <label for="memory-{{$value->id}}"
                                               class="{{(request('memory')[$value->id] ?? '') == 'on'?'ram' : ''}}">
                                            {{$value->size}}
                                            <input type="checkbox"
                                                   {{(request('memory')[$value->id] ?? '') == 'on'?'checked' : ''}}
                                                   id="memory-{{$value->id}}"
                                                   name="memory[{{$value->id}}]"
                                                   onchange="this.form.submit();"
                                            >
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="sidebar__item">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span>Sort By</span>
                                        <select onchange="this.form.submit()" name="sort">
                                            <option value="asc" {{(request('sort') ?? '') == 'asc'?'selected' : ''}}>
                                                Giá từ thấp -> cao
                                            </option>
                                            <option value="desc" {{(request('sort') ?? '') == 'desc'?'selected' : ''}}>
                                                Giá từ cao -> thấp
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">

                                </div>
                                <div class="col-lg-4 col-md-3">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($search || is_array($search))
                                @foreach ($search as $value)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <img style="object-fit: cover" class="product__item__pic set-bg" src="{{$value->images[0]->url}}">
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </img>
                                            <div class="product__item__text">
                                                <h6>
                                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}">{{$value->name}}</a>
                                                </h6>
                                                <h5>{{ number_format($value->price, 0)}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Kết quả tìm kiếm không có!!!</p>
                            @endif

                        </div>
                        <div>
                            @if ($search || is_array($search))
                            {!! $search->appends(request()->all())->links('pagination::bootstrap-5',) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
