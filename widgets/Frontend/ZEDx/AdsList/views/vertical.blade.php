@if ($ads->count())
<div class="panel panel-default">
  <div class="panel-body">
    @foreach ($ads as $ad)
    <div class="row">
      <div class="col-md-3">
        @if ($main_pic = $ad->photos()->main()->first())
        <a href="{{ route('ad.show', array($ad->id, str_slug($ad->content->title))) }}">
          <img class="img-responsisve img-rounded" src="{{ image_route('thumb', $main_pic->path) }}" alt="">
        </a>
        @else
        <a href="{{ route('ad.show', array($ad->id, str_slug($ad->content->title))) }}">
          <i class="fa fa-picture-o" style="font-size:70px"></i>
        </a>
        @endif
      </div>
      <div class="col-md-6">
         <h4><a href="{{ route('ad.show', array($ad->id, str_slug($ad->content->title))) }}">
         @if ($ad->adtype->is_headline) <i class="fa fa-star color-orange"></i> @endif {{ $ad->content->title }}</a>
         </h4>
        <p>{{ $ad->published_at->diffForHumans() }}</p>
      </div>
       <div class="col-md-3">
        <h5>{{ ($price = $ad->price()) && isset($price->pivot) ? number_format($price->pivot->value, trans('frontend.format.number.decimals') , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep'))." ".getAdCurrency($ad, $price->unit) : ""  }}</h5>
      </div>
    </div>
    <hr>
    <!-- /.row -->
    @endforeach
  </div>
</div>
@endif
