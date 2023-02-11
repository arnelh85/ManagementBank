<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">        
    <meta name="description" content="">
    <meta name="author" content="">        
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar-fixed-top/">
    <title>MANAGEMENT BANK - @yield('title')</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-1.12.4.min.js"><\/script>')</script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>        
    <link href="https://maxcdn.bootstrapcdn.com/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>                                                        
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap.min.js"></script>
    <style>
      body.def_bgColor {       
        background-color: #45423A;
      }

      .dataTables_filter>label,.dataTables_length>label,.dataTables_info {
        color:white;
      }
      
      footer.def_footer {
        width: 100%;
        height: 40px;
        position: fixed;
        bottom: 0;
        padding: 10px 0 0 0;
        text-align: center;
        font-family: Helvetica;
        font-size: 14px;
        font-weight: bold;
        color: #FFF;
        background-color: #000;
      }  
    </style>
    @yield('cssStyles')  
  </head>    
  <body class="def_bgColor">        
    <nav style="color:#FFF;background-color:#000;" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
          <a style="font-family:Verdana;font-size:16px;color:#B5BA14;" class="navbar-brand" href="{{ route('bankemployees.index') }}">MANAGEMENT BANK</a>          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @if(Session::exists('s_username'))              
              <li>
                <p style="margin:15px;font-family:Verdana;font-size:14px;font-weight:bold;color:#00FF00;">Logged user: {{ Session::get('s_bankEmployeeFullname') }}</p>                  
              </li>
              <li>
                <a style="font-family:Verdana;font-size:14px;color:#B5BA14;" href="{{ route('authentication.logout') }}">LOGOUT</a>
              </li>              
            @elseif(Session::missing('s_username'))
              <li>
                <a style="font-family:Verdana;font-size:14px;color:#B5BA14;" href="{{ route('authentication.login') }}">LOGIN</a>
              </li>
            @endif
            @if(Session::exists('s_employeeType') && Session::get('s_employeeType') == 1)
              <li>
                <a style="font-family:Verdana;font-size:14px;color:#B5BA14;" href="{{ route('bankemployees.index') }}">BANKEMPLOYEES</a>
              </li>
            @endif
            @if(Session::exists('s_username'))
              <li>
                <a style="font-family:Verdana;font-size:14px;color:#B5BA14;" href="{{ route('bankclients.index') }}">BANKCLIENTS</a>
              </li>  
              <li>
                <a style="font-family:Verdana;font-size:14px;color:#B5BA14;" href="{{ route('transactions.index') }}">TRANSACTIONS</a>
              </li>
            @endif    
          </ul>          
        </div>        
      </div>
    </nav>
    <footer class="def_footer">                                
      <p>Copyright © 2023, Arnel Hodzic</p>                          
    </footer>    
    @yield('content')  
    <script>
      (function () {
        setTimeout(() => {

        if ($('div.text-danger').length < 1) {
              localStorage.clear();                   
        }
            
        },1000);
      })();    
                            
      function populateFormAfterSubmit(formId) {
        (new Promise(function (resolve,reject) {

          try {
                   
            $(document).on('submit', '#'+formId, function (event) {                
            var array = $(this).serializeArray();

            for (let index = 0; index < array.length; index++) {

              const element = array[index];
              localStorage.setItem('#'+element.name,element.value);

            }
                       
            });                                      
            resolve();

          }

          catch {
            reject();
          }

        })).then(

          function(value) {
                  
            for (var i = 0; i < localStorage.length; i++) {
                  $(localStorage.key(i)).val(localStorage.getItem(localStorage.key(i)));
            }   

          },

          function(error) { 
            console.log(error); 
          }

        );
      };              
    </script>   
    @yield('scripts')                     
  </body>
</html>