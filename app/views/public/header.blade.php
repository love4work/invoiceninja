@extends('master')

@section('head')    

<link href="{{ asset('built.public.css') }}?no_cache={{ NINJA_VERSION }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('js/built.public.js') }}?no_cache={{ NINJA_VERSION }}" type="text/javascript"></script>

<style>
  .hero {
    background-image: url({{ asset('/images/hero-bg-1.jpg') }});
  }
  .hero-about {
    background-image: url({{ asset('/images/hero-bg-3.jpg') }});
  }
  .hero-plans {
    background-image: url({{ asset('/images/hero-bg-plans.jpg') }});
  }
  .hero-contact {
    background-image: url({{ asset('/images/hero-bg-contact.jpg') }});
  }
  .hero-features {
    background-image: url({{ asset('/images/hero-bg-3.jpg') }});
  }
  .hero-secure {
    background-image: url({{ asset('/images/hero-bg-secure-pay.jpg') }});
  }
 .hero-faq {
    background-image: url({{ asset('/images/hero-bg-faq.jpg') }});
  }   
  .hero-testi {
    background-image: url({{ asset('/images/hero-bg-testi.jpg') }});
  }   


</style>

@stop

@section('body')

<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=635126583203143";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->

{{ Form::open(array('url' => 'get_started', 'id' => 'startForm')) }}
{{ Form::hidden('guest_key') }}
{{ Form::hidden('sign_up', Input::get('sign_up')) }}
{{ Form::close() }}

<script>
  if (isStorageSupported()) {
    $('[name="guest_key"]').val(localStorage.getItem('guest_key'));          
  }

  @if (isset($invoiceNow) && $invoiceNow)
  getStarted();
  @endif

  function isStorageSupported() {
    if ('localStorage' in window && window['localStorage'] !== null) {
      var storage = window.localStorage;
    } else {
      return false;
    }
    var testKey = 'test';
    try {
      storage.setItem(testKey, '1');
      storage.removeItem(testKey);
      return true;
    } catch (error) {
      return false;
    }    
  }

  function getStarted() {
    $('#startForm').submit();
    return false;
  }
</script>
@if ((!isset($hideHeader) || !$hideHeader) && (!isset($showClientHeader) || !$showClientHeader))
<div class="navbar-top navbar hide-phone" style="margin-bottom:0px">
  <div class="container">
    <div class="navbar-inner">
      <ul>
        <li>{{ link_to('https://www.invoiceninja.com/about', trans('public.link_about_us') ) }}</li>
        <li>{{ link_to('https://www.invoiceninja.com/contact', trans('public.link_contact_us') ) }}</li>
        <li>{{ link_to('http://blog.invoiceninja.com', trans('public.link_blog') ) }}&nbsp;&nbsp;</li>
        
        <li><a href="https://www.facebook.com/invoiceninja" target="_blank"><span class="socicon">b</span></a></li>
        <li><a href="https://twitter.com/invoiceninja" target="_blank"><span class="socicon">a</span></a></li>
        <li><a href="https://www.linkedin.com/company/invoice-ninja" target="_blank"><span class="socicon">j</span></a></li>
        <li><a href="https://plus.google.com/104031016152831072143" target="_blank"><span class="socicon">c</span></a></li>
        <li><a href="https://github.com/hillelcoren/invoice-ninja" target="_blank"><span class="socicon">Q</span></a></li>
        <li><a href="https://www.pinterest.com/invoiceninja" target="_blank"><span class="socicon">d</span></a></li>
        <li><a href="http://blog.invoiceninja.com/feed/rss2" target="_blank"><span class="socicon">,</span></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="navbar" style="margin-bottom:0px">
  <div class="container">
      <div class="navbar-header">
          @if (!isset($hideLogo) || !$hideLogo)
            {{-- Per our license, please do not remove or modify this link. --}}                  
            <a class="navbar-brand" href="https://www.invoiceninja.com/"><img src="{{ asset('images/invoiceninja-logo.png') }}"></a>
          @endif
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">{{ trans('public.toggle_navigation') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>        
        </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="hide-desktop">{{ link_to('http://blog.invoiceninja.com', trans('public.link_blog') ) }}</li>
        <li class="hide-desktop">{{ link_to('https://www.invoiceninja.com/about', trans('public.link_about_us') ) }}</li>
        <li class="hide-desktop">{{ link_to('https://www.invoiceninja.com/contact', trans('public.link_contact_us') ) }}</li>          
        <li>{{ link_to('https://www.invoiceninja.com/features', trans('public.link_features') ) }}</li>
        <li>{{ link_to('https://www.invoiceninja.com/plans', trans('public.link_plans') ) }}</li>
        <li>{{ link_to('https://www.invoiceninja.com/compare-online-invoicing', trans('public.link_compare') ) }}</li>
        <li>{{ link_to('https://www.invoiceninja.com/testimonials', trans('public.link_testimonials') ) }}</li>
        <li>{{ link_to('https://www.invoiceninja.com/faq', trans('public.link_faq') ) }}</li>        
        <li><span class="glyphicon glyphicon-user"></span>      
          {{ link_to('login', trans(Auth::check() ? 'public.my_account' : 'public.login' )) }}</li>
      </ul>
    </div>
  </div>
</div>
@else
<div class="navbar" style="margin-bottom:0px">
  <div class="container">
    <div class="navbar-header">
      {{-- Per our license, please do not remove or modify this link. --}}                  
      @if (!isset($hideLogo) || !$hideLogo)
        <a class="navbar-brand" href="https://www.invoiceninja.com/"><img src="{{ asset('images/invoiceninja-logo.png') }}"></a>
      @endif
    </div>
    @if (isset($showClientHeader) && $showClientHeader)
    <ul class="nav navbar-nav">
      <span/>
      <li>{{ link_to('/client/quotes', trans('texts.quotes') ) }}</li>
      <li>{{ link_to('/client/invoices', trans('texts.invoices') ) }}</li>
      <li>{{ link_to('/client/payments', trans('texts.payments') ) }}</li>          
      <span/>
    </ul>                
    @endif    
  </div>
</div>
@endif

<div style="background-color:#211f1f; width:100%">
<div class="container">   
  @if (Session::has('warning'))
    <div class="alert alert-warning">{{ Session::get('warning') }}</div>
  @endif

  @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
  @endif

  @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
</div>
</div>

@yield('content')   


<footer class="footer" style="min-height:400px">

  @if ((!isset($hideHeader) || !$hideHeader) && (!isset($showClientHeader) || !$showClientHeader))
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <!--<div class="fb-follow" data-href="https://www.facebook.com/invoiceninja" data-colorscheme="light" data-layout="button" data-show-faces="false"></div>-->

          <!--<a href="https://twitter.com/invoiceninja" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @invoiceninja</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->
          <!--<div class="fb-like" data-href="https://www.invoiceninja.com" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>          -->
          <!--
          <div class="fb-share-button" data-href="https://www.invoiceninja.com/" data-type="button"></div>
          &nbsp;

          <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://www.invoiceninja.com/" data-via="invoiceninja" data-related="hillelcoren" data-count="none" data-text="Free online invoicing">Tweet</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
          &nbsp;
          <div class="g-plusone" data-size="medium" data-width="300" data-href="https://www.invoiceninja.com/" data-annotation="none" data-count="false" data-recommendations="false"></div>

          <script type="text/javascript">
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/platform.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
          </script>       
          &nbsp;
        -->

          <!--
          <script src="//platform.linkedin.com/in.js" type="text/javascript">
            lang: en_US
          </script>
          <script type="IN/Share" data-url="https://www.invoiceninja.com/"></script>
        -->

        <!--<iframe src="http://ghbtns.com/github-btn.html?user=hillelcoren&repo=invoice-ninja&type=watch" allowtransparency="true" frameborder="0" scrolling="0" width="62" height="20"></iframe>-->

        <a href="{{ NINJA_WEB_URL }}"><img src="{{ asset('images/footer-logo.png') }}"></a>
        <hr>
        <ul class="navbar-vertical">
          <li>{{ link_to('https://www.invoiceninja.com/features', trans('public.link_features') ) }}</li>
          <li>{{ link_to('https://www.invoiceninja.com/plans', trans('public.link_plans') ) }}</li>
          <li>{{ link_to('https://www.invoiceninja.com/compare-online-invoicing', trans('public.link_compare') ) }}</li>
          <li>{{ link_to('https://www.invoiceninja.com/testimonials', trans('public.link_testimonials') ) }}</li>
          <li>{{ link_to('https://www.invoiceninja.com/faq', trans('public.link_faq') ) }}</li>          
          <li>{{ link_to('http://blog.invoiceninja.com', trans('public.link_blog') ) }}</li>
          <li>{{ link_to('https://www.invoiceninja.com/about', trans('public.link_about_us') ) }}</li>
          <li>{{ link_to('https://www.invoiceninja.com/contact', trans('public.link_contact_us') ) }}</li>          
        </ul>
      </div> 

      <div class="col-md-4">
        <h3><span class="glyphicon glyphicon-share-alt"></span>{{ trans('public.connect_with_us') }}</h3>
        <div class="social">
          <div class="row1">
            <a href="https://www.facebook.com/invoiceninja" target="_blank"><img src="{{ asset('images/hex-facebook.png') }}"></a>
            <a href="https://twitter.com/invoiceninja" target="_blank"><img src="{{ asset('images/hex-twitter.png') }}"></a>
            <a href="https://www.linkedin.com/company/invoice-ninja" target="_blank"><img src="{{ asset('images/hex-linkedin.png') }}"></a>
            <a href="https://plus.google.com/104031016152831072143" target="_blank"><img src="{{ asset('images/hex-gplus.png') }}"></a>
          </div>
          <div class="row2">
            <a href="https://github.com/hillelcoren/invoice-ninja" target="_blank"><img src="{{ asset('images/hex-github.png') }}"></a>
            <a href="https://www.pinterest.com/invoiceninja" target="_blank"><img src="{{ asset('images/hex-pinterest.png') }}"></a>
            <a href="http://feeds.feedburner.com/invoiceninja" target="_blank"><img src="{{ asset('images/hex-rss.png') }}"></a>            
          </div>
        </div>
        <!--<h3><span class="glyphicon glyphicon-envelope"></span>Join Our Free Newsletter</h3>-->
          <div class="form-group">
          
            <!--

            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
            {{ Button::submit('')->append_with_icon('chevron-right') }}
            <span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
            -->

            <!--
            <form accept-charset="UTF-8" action="https://madmimi.com/signups/subscribe/107799" id="mad_mimi_signup_form" method="post" target="_blank">
             <div style="margin:0;padding:0;display:inline">
              <input name="utf8" type="hidden" value="✓"/>
              <input name="authenticity_token" type="hidden" value="jLAaWeg+Ew4gkbOUnMq+lv/Lt76bPCI/IGAWVitkFJ0="/>
            </div>
            <div class="mimi_field required">
              <input id="signup_email" placeholder="Email" class="form-control" name="signup[email]" type="text" data-required-field="This field is required" placeholder="you@example.com"/>
              <br/>
            </div>            
            <div>
              <input id="signup_first_name" placeholder="First Name" class="form-control" name="signup[first_name]" type="text" data-required-field="This field is required"/>
              <br/>
            </div>
            <div>
              <input id="signup_last_name" placeholder="Last Name" class="form-control" name="signup[last_name]" type="text" data-required-field="This field is required"/>
              <br/>
            </div>
            <div>
              <input type="submit" class="btn-lg btn-block submit" value="Subscribe" id="webform_submit_button" data-default-text="Subscribe" data-submitting-text="Sending…" data-invalid-text="↑ You forgot some required fields" data-choose-list="↑ Choose a list">
            </input>
            </div>
          </form>
          -->


<script type="text/javascript">
/*
(function() {
  var form = document.getElementById('mad_mimi_signup_form'),
      submit = document.getElementById('webform_submit_button'),
      validEmail = /.+@.+\..+/,
      isValid;
      
  form.onsubmit = function(event) {
    validate();
    if(!isValid) {
      revalidateOnChange();
      return false;
    }
  };
  
  function validate() {
    isValid = true;
    emailValidation();
    fieldAndListValidation();
    updateFormAfterValidation();
  }

  function emailValidation() {
    var email = document.getElementById('signup_email');
    if(!validEmail.test(email.value)) {
      textFieldError(email);
      isValid = false;
    } else {
      removeTextFieldError(email);
    }
  }

  function fieldAndListValidation() {
    var fields = form.querySelectorAll('.mimi_field.required');
    for(var i = 0; i < fields.length; ++i) {
      var field = fields[i],
          type  = fieldType(field);
      if(type == 'checkboxes' || type == 'radio_buttons') {
        checkboxAndRadioValidation(field);
      } else {
        textAndDropdownValidation(field, type);
      }
    }
  }

  function fieldType(field) {
    var type = field.querySelectorAll('.field_type');
    if(type.length > 0) {
      return type[0].getAttribute('data-field-type');
    } else if(field.className.indexOf('checkgroup') >= 0) {
      return 'checkboxes';
    } else {
      return 'text_field';
    }
  }

  function checkboxAndRadioValidation(field) {
    var inputs   = field.getElementsByTagName('input'),
        selected = false;
    for(var i = 0; i < inputs.length; ++i) {
      var input = inputs[i];
      if((input.type == 'checkbox' || input.type == 'radio') && input.checked) selected = true;
    }
    if(selected) {
      field.className = field.className.replace(/ invalid/g, '');
    } else {
      if(field.className.indexOf('invalid') == -1) field.className += ' invalid';
      isValid = false;
    }
  }

  function textAndDropdownValidation(field, type) {
    var inputs = field.getElementsByTagName('input');
    for(var i = 0; i < inputs.length; ++i) {
      var input = inputs[i];
      if(input.name.indexOf('signup') >= 0) {
        if(type == 'text_field') {
          textValidation(input);
        } else {
          dropdownValidation(field, input);
        }
      }
    }
    htmlEmbedDropdownValidation(field);
  }

  function textValidation(input) {
    if(input.id == 'signup_email') return;
    var val = input.value;
    if(val == '') {
      textFieldError(input);
      isValid = false;
      return;
    } else {
      removeTextFieldError(input)
    }
  }

  function dropdownValidation(field, input) {
    var val = input.value;
    if(val == '') {
      if(field.className.indexOf('invalid') == -1) field.className += ' invalid';
      onSelectCallback(input);
      isValid = false;
      return;
    } else {
      field.className = field.className.replace(/ invalid/g, '');
    }
  }

  function htmlEmbedDropdownValidation(field) {
    var dropdowns = field.querySelectorAll('.mimi_html_dropdown');
    for(var i = 0; i < dropdowns.length; ++i) {
      var dropdown = dropdowns[i],
          val      = dropdown.value;
      if(val == '') {
        if(field.className.indexOf('invalid') == -1) field.className += ' invalid';
        isValid = false;
        dropdown.onchange = validate;
        return;
      } else {
        field.className = field.className.replace(/ invalid/g, '');
      }
    }
  }

  function textFieldError(input) {
    input.className   = 'required invalid';
    input.placeholder = input.getAttribute('data-required-field');
  }

  function removeTextFieldError(input) {
    input.className   = 'required';
    input.placeholder = '';
  }

  function onSelectCallback(input) {
    if(typeof Widget != 'undefined' && Widget.BasicDropdown != undefined) {
      var dropdownEl = input.parentNode,
          instances  = Widget.BasicDropdown.instances;
      for(var i = 0; i < instances.length; ++i) {
        var instance = instances[i];
        if(instance.wrapperEl == dropdownEl) {
          instance.onSelect = validate;
        }
      }
    }
  }

  function updateFormAfterValidation() {
    form.className   = isValid ? '' : 'mimi_invalid';
    submit.value     = submitButtonText();
    submit.disabled  = !isValid;
    submit.className = isValid ? 'submit' : 'disabled';
  }

  function submitButtonText() {
    var invalidFields = document.querySelectorAll('.invalid'),
        text;
    if(isValid || invalidFields == undefined) {
      text = submit.getAttribute('data-default-text');
    } else {
      if(invalidFields.length > 1 || invalidFields[0].className.indexOf('checkgroup') == -1) {
        text = submit.getAttribute('data-invalid-text');
      } else {
        text = submit.getAttribute('data-choose-list');
      }
    }
    return text;
  }

  function revalidateOnChange() {
    var fields = form.querySelectorAll(".mimi_field.required");
    for(var i = 0; i < fields.length; ++i) {
      var inputs = fields[i].getElementsByTagName('input');
      for(var j = 0; j < inputs.length; ++j) {
        inputs[j].onchange = validate;
      }
    }
  }
})();
*/
</script>

          </div>
        </form>

      </div>

      <div class="col-md-4">
        @if (Request::secure())
        <h3><img src="{{ asset('images/icon-secure-footer.png') }}" style="margin-right: 8px; margin-top: -5px;"></span>{{ trans('public.safe_and_secure') }}</h3>
        <img src="{{ asset('images/ssl-footer.png') }}">
        <hr>
        @else
        <h3>&nbsp;</h3>
        @endif
        <a href="http://opensource.org/" target="_blank"><img src="{{ asset('images/opensource-footer.png') }}"></a>
      </div>

<!--
<ul class="navbar-list">
<li><a href="#">For developers</a></li>
<li><a href="#">Jobs</a></li>
<li><a href="#">Terms &amp; Conditions</a></li>
<li><a href="#">Our Blog</a></li>
</ul>
-->
</div>
</div>
</div>
</div>
@endif

</footer>

<script type="text/javascript">
  jQuery(document).ready(function($) {   
   $('.valign').vAlign();  
 });
</script>

<!--
<script type="text/javascript">
     jQuery(document).ready(function($) {   
   $('.expander').simpleexpand();
 });
</script>
-->

<!--
All images in the site need to have retina versions otherwise the log fills up with requests for missing files
<script src="{{ asset('/js/retina-1.1.0.min.js') }}" type="text/javascript"></script>
-->


@stop