<div>
    <div class="container" style="padding: 20px 0;">
        <div class="row">
            <div class="col-md-12">

                <div class="wrap-review-form">

                    <div id="comments">
                        <ol class="commentlist">
                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                <div id="comment-20" class="comment_container">
                                    <img alt="" src="{{asset('assets/images/books')}}/{{$orderItem->book->image}}" height="80" width="80">
                                    <div class="comment-text">

                                        <p class="meta">
                                            <strong class="woocommerce-review__author">{{$orderItem->book->name}}</strong>
                                        </p>

                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div><!-- #comments -->

                    <div id="review_form_wrapper">
                        <div id="review_form">
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>

                            @endif
                            <div id="respond" class="comment-respond">

                                <form wire:submit.prevent="addReview" id="commentform" class="comment-form" novalidate="">
                                    <p class="comment-notes">
                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                    </p>
                                    <div class="comment-form-rating">
                                        <span>Your rating</span>
                                        <p class="stars">

                                            <label for="rated-1"></label>
                                            <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                            @error('rating')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                            <label for="rated-2"></label>
                                            <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                            @error('rating')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                            <label for="rated-3"></label>
                                            <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                            @error('rating')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                            <label for="rated-4"></label>
                                            <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                            @error('rating')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                            <label for="rated-5"></label>
                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="rating">
                                            @error('rating')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                        </p>
                                    </div>
                                    {{-- <p class="comment-form-author">
                                        <label for="author">Name <span class="required">*</span></label>
                                        <input id="author" name="author" type="text" value="">
                                    </p>
                                    <p class="comment-form-email">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input id="email" name="email" type="email" value="" >
                                    </p> --}}
                                    <p class="comment-form-comment">
                                        <label for="comment">Your review <span class="required">*</span>
                                        </label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                        @error('comment')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                    </p>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                    </p>
                                </form>

                            </div><!-- .comment-respond-->
                        </div><!-- #review_form -->
                    </div><!-- #review_form_wrapper -->

                </div>

            </div><!-- col-md-12 -->

        </div>

    </div>
</div>
