<section class="form-section bg-general">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('volunteer_applications_store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="{{ __('main.ad_soyad') }}" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="{{ __('main.phone') }}" name="phone" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="{{ __('main.email') }}" name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="{{ __('main.birthday') }}" name="birthday">
                    </div>
                    <div class="d-flex  align-items-center justify-content-between">
                        <div class="form-group w-30">
                            <label class="radio-label" for="id_1">{{ __('main.male') }}</label>
                            <input class="radio-input" type="radio" id="id_1" name="gender" value="male">
                            <label class="radio-label" for="id_2">{{ __('main.female') }}</label>
                            <input class="radio-input" type="radio" id="id_2" name="gender" value="female">
                        </div>
                        <div class="form-group w-50">
                            <input class="type-input" type="file" name="image" id="file">
                            <label for="file" class="type-label">
                                {{ __('main.upload_photo') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="note" id="" rows="6" placeholder="{{ __('main.note') }}"></textarea>
                    </div>
                    <button class="submit-btn">{{ __('main.send') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
