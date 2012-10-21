<div id="fb-root"></div>
  <script>
    var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;

    if(is_chrome){
      /*window.fbAsyncInit = function() {
        FB.init({
          appId      : '{$_connect.app_id}', // App ID
          channelUrl : '{$_connect.channel_file}', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });
      {if !$_user.is_authorized}
      // listen for and handle auth.statusChange events
      FB.Event.subscribe('auth.statusChange', function(response) {
        if (response.authResponse) {
          // user has auth'd your app and is logged into Facebook
          FB.api('/me', function(me){
            if (me.name) {
              console.log(me);
              //window.location = 'index.php';
              // redirection is currently causing loop
            }
          })
        } else {}
      });
      {/if}
      };
      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/de_DE/all.js";
         ref.parentNode.insertBefore(js, ref);
       }(document));*/
    }
  </script>