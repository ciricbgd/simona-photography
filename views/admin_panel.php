<?php require_once 'admin_check.php'; ?>
<div class="container_admin_panel" id="admin_panel">
    <h1 class="admin_panel_title clickable">-Admin panel-</h1>
    <main role="main" class="container">
        <div class="row">


            <div class="col col-xl-4 col-md-6 col-sm-12 col-12">
                <h1>-Uredjivanje sekcija-</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ime kategorije</th>
                            <th scope="col">Naslovna str.</th>
                            <th scope="col">Izmeni</th>
                            <th scope="col">Obriši</th>
                        </tr>
                    </thead>
                    <tbody id="categories_list">
                    </tbody>
                </table>
            </div>



            <div class="col col-xl-3 col-md-4 col-sm-12 col-12">
                <h1>-Upload slika-</h1>
                <div id="drag-and-drop-zone" class="dm-uploader p-5">
                    <h3 class="mb-5 mt-5 text-muted">Prevuci slike ovde</h3>
                    <div class="btn btn-primary btn-block mb-5">
                        <span>Pronadji na disku</span>
                        <input type="file" title='Click to add Files' />
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="odaberi_kategoriju" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Odaberi kategoriju</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                                $query = "SELECT * FROM sections;";
                                $query_result = mysqli_query($conn,$query);
                                foreach($query_result as $section)
                                {
                                      echo '<label><input type="checkbox" class="section_chb" value="'.$section["id"].'">'.$section["name"].'</label>'; 
                                }
                            ?>
                        </div>
                    </div>
                    <p id="start_upload" class="clickable text-white bg-success">Pokreni upload</p>
                </div>
            </div>
            <p id="tester">Test</p>







            <div class="uploading_images">
                <ul id="files" class="row">

                </ul>
            </div>
        </div>


        <table class="section_edit_table table table-hover">

        </table>
    </main>
</div>
