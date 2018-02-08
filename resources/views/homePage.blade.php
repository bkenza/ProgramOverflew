<!DOCTYPE html>
<html xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <link class="user" href="{{URL::asset('css/zen-componentsCompatible.css')}}" rel="stylesheet" type="text/css">
      <link class="user" href="{{URL::asset('css/elements.css')}}" rel="stylesheet" type="text/css">
      <link class="user" href="{{URL::asset('css/common.css')}}" rel="stylesheet" type="text/css">
      <link class="user" href="{{URL::asset('css/dStandard.css')}}" rel="stylesheet" type="text/css">
      <link class="user" href="{{URL::asset('css/extended.css')}}" rel="stylesheet" type="text/css">
      <link class="user" href="{{URL::asset('css/setup.css')}}" rel="stylesheet" type="text/css">
      <link class="user" href="{{URL::asset('css/salesforce-lightning-design-system-vf.min.css')}}" rel="stylesheet" type="text/css">
	  <link class="user" href="{{URL::asset('css/Main_Page.css')}}" rel="stylesheet" type="text/css">
      <link rel="icon" type="image/x-icon">
	  <script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>
      <script src="{{URL::asset('js/Main_Page.js')}}"></script>
     @include('headerFooter')
   </head>
   <body>
    
	  <br/>
	  <br/>
	  <br/>
	 
	<div class="row">  
	

	  
	  
	  <div class="column1">
      <div class="slds-scope">
    <!--     <div class="slds-tabs_scoped">
            <ul class="slds-tabs_scoped__nav" role="tablist">
               <li class="slds-tabs_scoped__item slds-is-active" role="presentation" title="Item One"><a aria-controls="tab-scoped-1" aria-selected="true" class="slds-tabs_scoped__link" href="javascript:void(0);" id="tab-scoped-1__item" role="tab" tabindex="0">Java</a></li>
               <li class="slds-tabs_scoped__item" role="presentation" title="Item Two"><a aria-controls="tab-scoped-2" aria-selected="false" class="slds-tabs_scoped__link" href="javascript:void(0);" id="tab-scoped-2__item" role="tab" tabindex="-1">C#</a></li>
               <li class="slds-tabs_scoped__item" role="presentation" title="Item Three"><a aria-controls="tab-scoped-3" aria-selected="false" class="slds-tabs_scoped__link" href="javascript:void(0);" id="tab-scoped-3__item" role="tab" tabindex="-1">Apex</a></li>
            </ul>
            <div aria-labelledby="tab-scoped-1__item" class="slds-tabs_scoped__content slds-show" id="tab-scoped-1" role="tabpanel">Java</div>
            <div aria-labelledby="tab-scoped-2__item" class="slds-tabs_scoped__content slds-hide" id="tab-scoped-2" role="tabpanel">C#</div>
            <div aria-labelledby="tab-scoped-3__item" class="slds-tabs_scoped__content slds-hide" id="tab-scoped-3" role="tabpanel">Apex</div>
         </div> -->
         <div class="slds-feed">
            <ul class="slds-feed__list">
               <li class="slds-feed__item">
                  <article class="slds-post">
                     <header class="slds-post__header slds-media">
                        <div class="slds-media__figure">
                           <a class="slds-avatar slds-avatar_circle slds-avatar_large" href="javascript:void(0);">
                           <img alt="Jason Rodgers" src="../assets/images/avatar1.jpg" title="Jason Rodgers avatar">
                           </a>
                        </div>
                        <div class="slds-media__body">
                           <div class="slds-grid slds-grid_align-spread slds-has-flexi-truncate">
                              <p><a href="javascript:void(0);" title="Jason Rodgers">Jason Rogers</a> — <a href="javascript:void(0);" title="Design Systems">Design Systems</a></p>
                              <button aria-haspopup="true" class="slds-button slds-button_icon slds-button_icon-border slds-button_icon-x-small" title="More Options">
                              <img src="../assets/icons/utility/down_60.png" alt="Smiley face" height="17" width="17">
                              <span class="slds-assistive-text">More Options</span>
                              </button>
                           </div>
                           <p class="slds-text-body_small"><a class="slds-text-link_reset" href="javascript:void(0);" title="Click for single-item view of this post">5 days Ago</a></p>
                        </div>
                     </header>
                     <div class="slds-post__content slds-text-longform">
                        <p>Hey there! Here's the latest demo presentation <a href="javascript:void(0);" title="Jenna Davis">@Jenna Davis</a>, let me know if there are any changes. I've updated slides 3-8 and slides 16-18 slides with new product shots.</p>
                     </div>
                     <footer class="slds-post__footer">
                        <ul class="slds-post__footer-actions-list slds-list_horizontal">
                           <li class="slds-col slds-item slds-m-right_medium">
                              <button aria-pressed="false" class="slds-button_reset slds-post__footer-action" title="Like this item">
                              <img src="../assets/icons/utility/like_60.png" alt="Smiley face" height="17" width="17"> Like</button>
                           </li>
                           <li class="slds-col slds-item slds-m-right_medium">
                              <button class="slds-button_reset slds-post__footer-action comment_button" title="Comment on this item" id="Comment_box">
                              <img src="../assets/icons/utility/share_post_60.png" alt="Smiley face" height="17" width="17"> Comment</button>
                           </li>
                           <li class="slds-col slds-item slds-m-right_medium">
                              <button class="slds-button_reset slds-post__footer-action" title="Share this item">
                              <img src="../assets/icons/utility/internal_share_60.png" alt="Smiley face" height="17" width="17"> Share</button>
                           </li>
                        </ul>
                        <ul class="slds-post__footer-meta-list slds-list_horizontal slds-has-dividers_right slds-text-title">
                           <li class="slds-item">20 shares</li>
                           <li class="slds-item">259 views</li>
                        </ul>
                     </footer>
                  </article>
                  <div class="slds-feed__item-comments">
                     <div class="slds-p-horizontal_medium slds-p-vertical_x-small slds-grid">
                        <button class="slds-button_reset slds-text-link">More comments</button>
                        <span class="slds-text-body_small slds-col_bump-left">1 of 8</span>
                     </div>
                     <ul>
                        <li>
                           <article class="slds-comment slds-media slds-hint-parent">
                              <div class="slds-media__figure">
                                 <a class="slds-avatar slds-avatar_circle slds-avatar_medium" href="javascript:void(0);">
                                 <img alt="Jenna Davis" src="../assets/images/avatar2.jpg" title="Jenna Davis avatar">
                                 </a>
                              </div>
                              <div class="slds-media__body">
                                 <header class="slds-media slds-media_center">
                                    <div class="slds-grid slds-grid_align-spread slds-has-flexi-truncate">
                                       <p class="slds-truncate" title="Jenna Davis"><a href="javascript:void(0);">Jenna Davis</a></p>
                                       <button aria-haspopup="true" class="slds-button slds-button_icon slds-button_icon-border slds-button_icon-x-small" title="More Options">
                                       <img src="../assets/icons/utility/down_60.png" alt="Smiley face" height="17" width="17">
                                       <span class="slds-assistive-text">More Options</span>
                                       </button>
                                    </div>
                                 </header>
                                 <div class="slds-comment__content slds-text-longform">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                 <footer>
                                    <ul class="slds-list_horizontal slds-has-dividers_right slds-text-body_small">
                                       <li class="slds-item">
                                          <button aria-pressed="false" class="slds-button_reset slds-text-color_weak" title="Like this item">Like</button>
                                       </li>
                                       <li class="slds-item">16hr Ago</li>
                                    </ul>
                                 </footer>
                              </div>
                           </article>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="slds-feed__item">
                  <article class="slds-post">
                     <header class="slds-post__header slds-media">
                        <div class="slds-media__figure">
                           <a class="slds-avatar slds-avatar_circle slds-avatar_large" href="javascript:void(0);">
                           <img alt="Jason Rodgers" src="../assets/images/avatar1.jpg" title="Jason Rodgers avatar">
                           </a>
                        </div>
                        <div class="slds-media__body">
                           <div class="slds-grid slds-grid_align-spread slds-has-flexi-truncate">
                              <p><a href="javascript:void(0);" title="Jason Rodgers">Jason Rogers</a> — <a href="javascript:void(0);" title="Design Systems">Design Systems</a></p>
                              <button aria-haspopup="true" class="slds-button slds-button_icon slds-button_icon-border slds-button_icon-x-small" title="More Options">
                              <img src="../assets/icons/utility/down_60.png" alt="Smiley face" height="17" width="17">
                              <span class="slds-assistive-text">More Options</span>
                              </button>
                           </div>
                           <p class="slds-text-body_small"><a class="slds-text-link_reset" href="javascript:void(0);" title="Click for single-item view of this post">5 days Ago</a></p>
                        </div>
                     </header>
                     <div class="slds-post__content slds-text-longform">
                        <p>Hey there! Here's the latest demo presentation <a href="javascript:void(0);" title="Jenna Davis">@Jenna Davis</a>, let me know if there are any changes. I've updated slides 3-8 and slides 16-18 slides with new product shots.</p>
                     </div>
                     <footer class="slds-post__footer">
                        <ul class="slds-post__footer-actions-list slds-list_horizontal">
                           <li class="slds-col slds-item slds-m-right_medium">
                              <button aria-pressed="false" class="slds-button_reset slds-post__footer-action" title="Like this item">
                                 <img src="../assets/icons/utility/like_60.png" alt="Smiley face" height="17" width="17">Like</button>
                           </li>
                           <li class="slds-col slds-item slds-m-right_medium">
                              <button class="slds-button_reset slds-post__footer-action comment_button" title="Comment on this item" >
                              <img src="../assets/icons/utility/share_post_60.png" alt="Smiley face" height="17" width="17"> Comment</button>
                           </li>
                           <li class="slds-col slds-item slds-m-right_medium">
                              <button class="slds-button_reset slds-post__footer-action" title="Share this item">
                              <img src="../assets/icons/utility/internal_share_60.png" alt="Smiley face" height="17" width="17"> Share</button>
                           </li>
                        </ul>
                        <ul class="slds-post__footer-meta-list slds-list_horizontal slds-has-dividers_right slds-text-title">
                           <li class="slds-item">20 shares</li>
                           <li class="slds-item">259 views</li>
                        </ul>
                     </footer>
                  </article>
               </li>
			   <div class="slds-publisher" id="comments_section">            
            <textarea  class="slds-publisher__input slds-textarea slds-text-longform" id="comment-text-input2" placeholder="Write a comment…"></textarea>
            <div class="slds-publisher__actions slds-grid slds-grid_align-spread">
               <button class="slds-button slds-button_brand">Post</button>
            </div>
         </div>
            </ul>
         </div>
         
     <!--    <div class="slds-form-element">
            <span class="slds-form-element__label" id="file-selector-primary-label">Attachment</span>
            <div class="slds-form-element__control">
               <div class="slds-file-selector slds-file-selector_files">
                  <div class="slds-file-selector__dropzone">
                     <input accept="image/png" aria-labelledby="file-selector-primary-label file-selector-secondary-label" class="slds-file-selector__input slds-assistive-text" id="file-upload-input-01" type="file">
                     <label class="slds-file-selector__body" for="file-upload-input-01" id="file-selector-secondary-label">
                     <span class="slds-file-selector__button slds-button slds-button_neutral">
                     <img src="./assets/icons/utility/upload_60.png" alt="Smiley face" height="17" width="17">Upload Files</span>
                     <span class="slds-file-selector__text slds-medium-show">or Drop Files</span>
                     </label>
                  </div>
               </div>
            </div>
         </div>   -->
         <br>
         <br>
         <br>
      </div>
	  </div>
	  
	  
	  	<div class="column2">
	  <div class="slds-post__content slds-text-longform">
	  
                       
   <p>Cannot find an answer? Do not worry. Try the search here.....</p>
    <gcse:searchbox></gcse:searchbox>
</div>

<div>
    <gcse:searchresults></gcse:searchresults>
</div>
</div>
	  
	  </div>
   </body>
</html>