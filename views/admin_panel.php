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
                    <div id="drag-and-drop-zone" class="dm-uploader p-5">
                        <h3 class="mb-5 mt-5 text-muted">Prevuci slike ovde</h3>
                        <div class="btn btn-primary btn-block mb-5">
                            <span>Pronadji na disku</span>
                            <input type="file" title='Click to add Files' />
                        </div>
                        <p id="start_upload" class="clickable text-white bg-success">Pokreni upload</p>
                    </div>
                </div>
                <div class="col col-xl-3 col-md-4 col-sm-12 col-12">
                    <h1>-Uredjivanje sekcija-</h1>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown button</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>






                <div class="uploading_images">
                    <ul id="files" class="row">
                    </ul>
                </div>
            </div>
        </main>

    </div>
