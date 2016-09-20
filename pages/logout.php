profile<?php
session_start();
   session_destroy();
   unset($_SESSION);
   
   header("Location: ?page=index");



?>
</head>
<body>

        <!-- Top content -->
        <div class="top-content">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">

                            <div class="description">
                            	<h1>
	                            	Je bent nu uitgelogd!
                            	</h1>
                            	<br>
                            	<a href="?page=login" class="disband">Terug naar login pagina!</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

</body>
</html>
</body>
</html>