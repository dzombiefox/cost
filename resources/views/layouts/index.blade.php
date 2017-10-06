<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    <title>CJF-COST</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!--  Android 5 Chrome Color-->
    <meta name="theme-color" content="#EE6E73">
    <!-- CSS-->
     {{ HTML::style('/css/prism.css') }}
     {{ HTML::style('/css/ghpages-materialize.css') }}
     {{ HTML::style('/media/css/dataTables.bootstrap.css') }}
     {{ HTML::style('/media/css/dataTables.jqueryui.css') }}
     {{ HTML::style('/media/css/jquery.dataTables.css') }}
     {{ HTML::style('/css/select2.css') }}
     {{ HTML::script('/js/jquery-2.1.4.min.js') }}
     {{ HTML::script('/js/select2.js') }}
     
    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
 
    <style type="text/css">

  .demo-avatar {
     
  width: 100px;
  height: 100px;
  border-radius: 54px;
  background: #b3d4fc;  

}
.dap-table
{
margin:10px;
border-collapse:collapse;
font-family:Helvetica,Arial;
font-size:14px;
box-shadow:1px 1px 4px  #dcdcdc;
-moz-box-shadow:1px 1px 4px  #dcdcdc;
-webkit-box-shadow:1px 1px 4px  #dcdcdc;
-o-box-shadow:1px 1px 4px  #dcdcdc;
}
.dap-table th
{
text-align: center;					
	padding: 1em;
	background-color: #e8503a;			
	color: white;
}

.dap-table td
{
padding:8px;
color:#777777;
border:1px solid #dcdcdc;
}
.dap-table tr:hover
{
background:#f0f0f0;
}

table.one {									 
	margin-bottom: 3em;	
	border-collapse:collapse;
	margin-right: 3em;		
box-shadow:1px 1px 4px  #dcdcdc;
-moz-box-shadow:1px 1px 4px  #dcdcdc;
-webkit-box-shadow:1px 1px 4px  #dcdcdc;
-o-box-shadow:1px 1px 4px  #dcdcdc;
}	

	
	table.one td {								
	
	width: 10em;					
	padding: 1em; 		}		


	table.one th {								
	text-align: center;					
	padding: 1em;
	background-color: #e8503a;			
	color: white;		}			      

	table.one tr {	
	height: 1em;	}

	table.one tr:nth-child(even) {			
        background-color: #eee;		}

	table.one tr:nth-child(odd) {			
	background-color:#fff;		}



</style>
    <style>
        .bread{
           padding-left: 30px;
        }
    </style>
    
    <script src="../../js/live.js"></script>
  </head>
  <body>
    
    <main style="background-color: #FFF">
        <div class="container bsa " style="width: 100%;height: auto" >
  @yield('content')
    <div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">menu</i>
    </a>
    <ul>
     
      <li class="waves-effect waves-light"><a href="/logout">Logout</a></li>
    </ul>
  </div>
        
</div>

    </main>    
   
    <script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }
    </script>
      {{ HTML::script('/js/timeago.min.js') }}
      {{ HTML::script('/js/prism.js') }}
      {{ HTML::script('/js/lunr.min.js') }}
      {{ HTML::script('/js/materialize.js') }}
      {{ HTML::script('/js/init.js') }}
      {{ HTML::script('/js/select2.js') }}
      {{ HTML::script('/media/js/jquery.dataTables.js') }}
   
    <!-- Twitter Button -->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    <!-- Google Plus Button-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!--  Google Analytics  -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-56218128-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
    </script>
    
    <script>    
    $(document).ready(function(){
          $('#example').DataTable();
          
    });</script>
  </body>
</html>
