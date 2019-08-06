@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><span class="text-danger">{{ __('Grow Your Business with Us !') }}</span>&nbsp;||&nbsp;<Span class="text-primary">{{ __('Maximize your Earnings') }}</Span></div>

                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{!! asset('theme/img/undraw_posting_photo.svg') !!}" alt="">
                        </div>
                        <p>Add some quality to your business and make more profit through <a target="_blank" rel="nofollow" href="#">Our App</a>, that is simple and caters for all your needs just as you want it!</p>
                        <a target="_blank" rel="nofollow" href="#">Browse here for Documentation &rarr;</a>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection