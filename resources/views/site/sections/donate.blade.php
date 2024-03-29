<section class="form-section bg-general">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form action="{{ route('admin.donate_messages.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <input type="text" placeholder="{{ __('main.ad_soyad') }}" name="fullname" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" placeholder="{{ __('main.phone') }}" name="phone" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="email" placeholder="{{ __('main.email') }}" name="email" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <select name="service_id">
                                @foreach ($services as $service)
                                    <option value="{{$service->id}}">{{$service->getTranslate->where('lang', Session('lang'))->first()->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" placeholder="{{ __('main.amount') }}" name="amount" required>
                        </div>
                        <div class="form-group">
                            <textarea name="note" rows="6" placeholder="{{ __('main.note') }}"></textarea>
                        </div>
                        <button class="submit-btn">{{ __('main.send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
