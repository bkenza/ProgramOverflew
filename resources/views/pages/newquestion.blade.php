@include('includes.head')
@include('includes.headerfooter')
{{--REMAKE THE CSS--}}
<body>
<div class="slds-scope">
    <div>
        <article id="postquestions" class="slds-card"
                 style="        width: 98%;float: right;margin-right: 12px;margin-top: 10px;">
            <form class="form-horizontal" method="POST" action="/newpost/do" id="postForm" onKeyup="checkForm()">
                {{csrf_field()}}
                <div class="slds-card__header slds-grid">
                    <header class="slds-media slds-media_center slds-has-flexi-truncate">
                        <div class="slds-media__figure">
                              <span class="slds-icon_container slds-icon-action-question-post-action slds-icon_container--circle"
                                    title="Post question icon">
                                 <svg class="slds-icon slds-icon_small" aria-hidden="true">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                         xlink:href="/assets/icons/action-sprite/svg/symbols.svg#question_post_action"/>
                                 </svg>
                              </span>
                        </div>
                        <div class="slds-media__body">
                            <h2>
                                <a href="javascript:void(0);" class="slds-card__header-link slds-truncate"
                                   title="new question">
                                    <span class="slds-text-heading_small">Post a new question</span>{{--header--}}
                                </a>
                            </h2>
                        </div>
                    </header>
                    {{--<div class="slds-no-flex">
                       <button class="slds-button slds-button_neutral" onclick="showpostquestion();">New</button>
                    </div>--}}
                </div>
                <div class="slds-card__body slds-card__body_inner">
                    <div class="container" id="postquestion" {{--style="display : none;"--}}>
                        <fieldset>
                            <div class="slds-form-element">
                                <label class="slds-form-element__label" for="textarea-id-01">Category</label>
                                <select name="category">
                                    <option class="form-control" value="Java">Java</option>
                                    <option class="form-control" value="JavaScript">JavaScript</option>
                                    <option class="form-control" value="Php">Php</option>
                                    <option class="form-control" value="C">C</option>
                                </select>
                            </div>

                            <!-- Textarea -->
                            <div class="slds-form-element">
                                <label class="slds-form-element__label" for="textarea-id-01">Title</label>
                                <div class="slds-form-element__control">
                                    <input type="text" class="form-control input-md slds-publisher__input" placeholder="Min 6 chars. Max 250 chars." name="title" id = "title" style="width:30%"/>
                                </div>
                            </div>
                            <!-- Textarea -->
                            <div class="slds-form-element">
                                <label class="slds-form-element__label" for="textarea-id-01">Question</label>
                                <div class="slds-form-element__control">
                                    <input type="text" class="form-control input-md slds-publisher__input" style="width:50%" class="slds-textarea" placeholder="Min 6 chars. Max 250 chars."
                                           name="content" id = "content" />
                                </div>
                            </div>
                            </br>
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="button1id"></label>
                                <div class="col-md-8">
                                    <input type="submit" id="newpostButton" class="slds-button slds-button_brand"
                                           value="Post" disabled/>
                                    <input type="reset" id="resetButton" class="slds-button slds-button_destructive"
                                           value="Reset"/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>
            <footer class="slds-card__footer"></footer>
        </article>
    </div>
</div>
</body>
<link class="user" href="{{URL::asset('css/salesforce-lightning-design-system-vf.min.css')}}" rel="stylesheet"
      type="text/css">
<link class="user" href="{{URL::asset('css/mainpage.css')}}" rel="stylesheet" type="text/css">
<link class="user" href="{{URL::asset('css/ourstyle.css')}}" rel="stylesheet" type="text/css">
<link rel="icon" type="image/x-icon">
<script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/mainpage.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/post.js') }}" type="text/javascript"></script>