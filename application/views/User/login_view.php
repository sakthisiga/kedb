
<body class="hold-transition login-page">
    <div class="login-box">
    
    <div class="span4 offset4">
    	 <div id="login-form-error"></div>
    </div>
    
      <div class="login-logo">
        <a href="<?=base_url()?>login"><b>Xerox </b><small>| ECCRM</small></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form id="login-form" class="form-signin" method="post" action="<?=site_url('api/login')?>">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="username" name= "username" placeholder="C - ID">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
           
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="#">I forgot my password</a><br>
        <a href="<?=site_url('login/register')?>" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>


<script type="text/javascript">
$(function(){
    $("#login-form-error").hide();
    $("#login-form").submit(function(evt){
        evt.preventDefault();
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url, postData, function(o){
           if(o.result == 1) {
               window.location.href = '<?=site_url('home')?>';
           } 
           else
           {
              $("#login-form-error").show();
              var output = '<div id="login-form-errr" class="alert alert-error">';
                  output += '<ul>';
               if(o.error2)
               {
                   output += '<li>' + o.error2 + '</li>';
               }
               else
               {
                    for (var key in o.error)
                    {
                         var value = o.error[key];
                         output += '<li>' + value + '</li>';
                    }
                }
               output += '</ul>';
               output += '</div>';
               $("#login-form-error").html(output).fadeIn();
           }
           setTimeout( function(){
        	   $("#login-form-error").fadeOut();
       	},3000);
        },'json');
    });
});
</script>
    
</body>