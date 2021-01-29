<div class="card mt-2">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
          <img src="{{ asset('backend/images/logo.png') }}" class="img-fluid" style="width:150px" alt="{{ config('app.name') }}">
          {!! DNS2D::getBarcodeSVG($order->barcode, 'QRCODE', 3, 3) !!}
      </div>
      <div class="d-flex justify-content-between">
          <ul class="list mt-3">
              <li><span>أسم العميل</span>: <span>{{ $order->client_name }}</span></li>
              <li><span>المدينة</span>: <span>{{ $order->city->name }}</span></li>
          </ul>
          <ul class="list mt-3">
              <li><span>أسم البائع</span>: <span>{{ $order->seller->name }}</span></li>
              <li><span>رقم الهاتف</span>: <span>{{ $order->phone }}</span></li>
          </ul>
      </div>
      <ul class="list mb-0">
          <li><span>العنوان</span>: <span>{{ $order->address }}</span></li>
      </ul>
  </div>
</div>
<div class="card mt-2">
  <div class="card-body">
      {!! $order->content !!}
  </div>
</div>
<div class="card mt-2">
  <div class="card-body">
      <ul class="list mb-0">
          <li><span>السعر الكلى</span>: <span>{{ $order->price + $order->shipping_price}} ج.م </span></li>
      </ul>
  </div>
</div>