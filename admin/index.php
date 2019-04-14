<?php include "includes/adminHeader.php";?>


    
    <title>Login</title>
    
<?php


// redirecting if admin is already logged
    if(isset($_SESSION['username'])){
        header('location: vijesti.php');
    } 

     if(isset($_GET['signout'])){  
   if($_GET['signout'] == "izloguj"){
       unset($_SESSION['username']);
   }
  }

?>
    
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 p-2">
              <div class="row justify-content-center">
                       
                    <div class="col-lg-3 col-sm-6 col-10 login_container p-0">
                        <div class="col-sm-12 col-12 text-center login_header">
                            <span>LOGIN</span>
                        </div>
                        <form id="loginForm">
                        <span class="p-2 my-2" id="loginResult" style="color:red; font-size:12px"></span>    
                        <div class="col-sm-12 col-12 form-group pt-2">
                            <div class="col-sm-12 col-12 pl-0 mt-2">
                                <label class="login_label" for="username">Korisničko ime</label>
                            </div>
                            <div class="col-sm-12 col-12 pl-0">
                                <input type="text" name="username" id="username" class="login_input">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12 form-group">
                            <div class="col-sm-12 col-12 pl-0">
                                <label class="login_label" for="password">Lozinka</label>
                            </div>
                            <div class="col-sm-12 col-12 pl-0">
                                <input type="password" name="password" id="password" class="login_input">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12 form-group my-4">
                            <button class="login_btn" type="submit"><i class="fas fa-check"></i>&ensp;PRIJAVA</button>
                        </div>
                        </form>    
                       </div>
                    
                    </div>
                </div>
            </div>
        </div>    
    </div>
<script>
    $("#loginForm").submit(function(e){
        e.preventDefault();
        
        var formData = new FormData($(this)[0]);
        
        $form = $(this);
        
         $.ajax({
                type: 'POST',
                url: 'ajaxRequests/login.php',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success:function(message){
                      if(message === 'Success'){
                          window.location = 'vijesti.php';
                      }else{
                        $form.find("#loginResult").text(message);
                      }
                }
        })
        
    });
</script>
</body>
</html>
