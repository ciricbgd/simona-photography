<?php
if(!$_SESSION['role']==1) 
{ 
    header('location: ../index.html');
}
else{
    
}
?>
    <div class="container_admin_panel">
        <h1 class="admin_panel_title clickable">-Admin panel-</h1>
        <main role="main" class="container">
            <div class="row">
                <div class="col col-xl-3 col-md-4 col-sm-12 col-12">
                    <h1>-Upload slika-</h1>
                    <!-- Our markup, the important part here! -->
                    <div id="drag-and-drop-zone" class="dm-uploader p-5">
                        <h3 class="mb-5 mt-5 text-muted">Prevuci slike ovde</h3>

                        <div class="btn btn-primary btn-block mb-5">
                            <span>Pronadji na disku</span>
                            <input type="file" title='Click to add Files' />
                        </div>
                    </div>
                    <!-- /uploader -->

                </div>
                <div class="uploading_images">
                    <ul id="files" class="row">
                    </ul>
                </div>
            </div>
        </main>

    </div>
