<div class="card mt-2">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('backend/images/logo.png') }}" class="img-fluid" style="width:150px" alt="{{ config('app.name') }}">
                <p class="text-muted" dir="auto">{{ config('info.phone') }}</p>
            </div>
            {!! DNS2D::getBarcodeSVG($order->barcode, 'QRCODE', 3, 3) !!}
      </div>
      <div class="d-flex justify-content-between">
          <ul class="list mt-3">
              <li><span>أسم العميل</span>: <span>{{ $order->client_name }}</span></li>
              <li><span>المدينة</span>: <span>{{ $order->city->name }}</span></li>
          </ul>
          <ul class="list mt-3">
              <li><span>أسم البائع</span>: <span>{{ $order->seller->company_name }}</span></li>
              <li><span>رقم الهاتف</span>: <span>{{ $order->phone }}</span></li>
          </ul>
      </div>
      <ul class="list mb-0">
          <li style="height: 120px;"><span>العنوان</span>: <span>{{ mb_substr($order->address, 0, 200) }}</span></li>
      </ul>
  </div>
</div>
<div class="card mt-2">
  <div class="card-body">
      <ul class="list mb-0">
          <li><span>السعر الكلى</span>: <span>{{ $order->price + $order->shipping_price}} ج.م </span></li>
      </ul>
  </div>
</div>