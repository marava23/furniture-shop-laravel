<div id="review" class="tab-pane fade in active show">
    <div class="spr-form">
        <div class="user-comment">
            @foreach($product->reviews as $review)
                <div class="spr-review">
                    <div class="spr-review-header">
                        <span class="spr-review-header-byline">
                            <strong>{{$review->name}}</strong> -
                            <span>{{date('d-m-Y', strtotime($review->created_at))}}</span>
                        </span>
                    </div>
                    <div class="spr-review-content">
                        <p class="spr-review-content-body">{{$review->review}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <form method="POST" action="{{route('review')}}" class="new-review-form">
        @csrf
        <input type="hidden" name="product" value="{{$product->id}}">
        <h3 class="spr-form-title">Write a review</h3>
        <fieldset class="spr-form-contact">
            <div class="spr-form-contact-name">
                <input class="spr-form-input spr-form-input-text form-control" name="name"  placeholder="Enter your name"
                       @if(session()->has('user'))
                           value="{{session('user')->username}}"
                       @else
                       value="{{old('name') ?? ""}}"
                       @endif
                >
            </div>
            <div class="spr-form-contact-email">
                <input class="spr-form-input spr-form-input-email form-control" name="email" placeholder="Enter your email"
                       @if(session()->has('user'))
                           value="{{session('user')->email}}"
                       @else
                           value="{{old('email') ?? ""}}"
                       @endif
                >
            </div>
        </fieldset>
        <fieldset>
            <div class="spr-form-review-body">
                <div class="spr-form-input">
                    <textarea class="spr-form-input-textarea" rows="10" name="review" placeholder="Write your comments here"></textarea>
                </div>
            </div>
        </fieldset>
        <div class="submit">
            <input type="submit" name="addComment" id="submitComment" class="btn btn-default" value="Submit Review">
        </div>
    </form>
    @include('partials.messages')
</div>
