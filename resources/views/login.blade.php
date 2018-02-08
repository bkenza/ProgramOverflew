<!DOCTYPE html>
<!-- saved from url=(0053)https://c.na73.visual.force.com/apex/W_341_Login_Page -->
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
      <div class="slds-scope">
	  
	  
         <div class="demo-only" style="height: 640px;">
            <section aria-describedby="modal-content-id-1" aria-labelledby="modal-heading-01" aria-modal="true" class="slds-modal slds-fade-in-open" role="dialog" tabindex="-1">
               <div class="slds-modal__container">
                  <header class="slds-modal__header">
                     <button class="slds-button slds-button_icon slds-modal__close slds-button_icon-inverse" title="Close">
                        <svg aria-hidden="true" class="slds-button__icon slds-button__icon_large">
                           <use xlink:href="../assets/icons/utility-sprite/svg/symbols.svg#close" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <span class="slds-assistive-text">Close</span>
                     </button>
                     <h2 class="slds-text-heading_medium slds-hyphenate" id="modal-heading-01">Member Login</h2>
                  </header>
                  <div class="slds-modal__content slds-p-around_medium" id="modal-content-id-1">
                     <div class="slds-form slds-form_stacked">
                        <div class="slds-form-element">
                           <label class="slds-form-element__label" for="input-id-01">Username</label>
                           <div class="slds-form-element__control">
                              <input class="slds-input" id="input-id-01" placeholder="Enter username..." type="text">
                           </div>
                        </div>
                        <div class="slds-form-element">
                           <label class="slds-form-element__label" for="input-id-01">Password</label>
                           <div class="slds-form-element__control">
                              <input class="slds-input" id="input-id-01" placeholder="Enter password..." type="text">
                           </div>
                        </div>
                     </div>
                  </div>
                  <footer class="slds-modal__footer">
                     <button class="slds-button slds-button_brand">Log in</button>
                  </footer>
               </div>
            </section>
            <div class="slds-backdrop slds-backdrop_open"></div>
         </div>
      </div>
   </body>
</html>