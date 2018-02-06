            $(".album_section").hide();

            // Get images

            function get_img(section_id) {
                $.ajax({
                    type: 'GET',
                    url: './db/get_img.php',
                    data: {
                        section_id: section_id
                    },
                    success: function (data) {

                        var data_parsed = JSON.parse(data);
                        var images = '<div class="grid-sizer"></div><div class="gutter-sizer"></div>';

                        $.each(data_parsed, function (i, picture) {
                            images += '<div class="member">';
                            images += '    <img src="img/pictures/' + picture.path + '" alt="' + picture.alt + '"/>';
                            images += '</div>';
                        });

                        $('.grid').html(images);
                    }
                });
            }

            get_img(1);

            //! Get images




            // DOCUMENT READY!
            $(document).ready(function () {
                //Album slide toggle
                $("#album_button").click(function () {
                    $(".album_section").slideToggle(300, "swing");
                });
                //! Album slide toggle

                // Admin stuff down here
                if ($('#admin_panel').length > 0) {


                    // Load sections
                    function load_sections() {
                        $.ajax({
                            type: 'GET',
                            url: './db/load_sections.php',
                            success: function (data) {

                                var data_parsed = JSON.parse(data);
                                var categories = "";
                                categories += '<tr>';
                                categories += '    <td scope="row" data-id="0">Unassigned</td>';
                                categories += '    <td></td>';
                                categories += '    <td><button type="button" class="btn btn-secondary btn-sm section_edit" data-id="0">Izmeni</button></td>';
                                categories += '    <td></td>';
                                categories += '</tr>';
                                categories += '<tr>';
                                categories += '    <td scope="row" data-id="1">Main</td>';
                                categories += '    <td></td>';
                                categories += '    <td><button type="button" class="btn btn-secondary btn-sm section_edit" data-id="1">Izmeni</button></td>';
                                categories += '    <td></td>';
                                categories += '</tr>';
                                var catecategories_image_edit = "";

                                $.each(data_parsed, function (i, section) {

                                    var data_id = 'data-id="' + section.id + '"';

                                    if (i != 0) {
                                        categories += '<tr>';
                                        categories += '    <td scope="row" ' + data_id + '>' + section.name + '</td>';
                                        if (section.featured == 1) {
                                            var section_checked = "checked"
                                        } else {
                                            var section_checked = ""
                                        }
                                        categories += '    <td><input class="section_checkbox" type="checkbox" ' + data_id + ' ' + section_checked + '></td>';
                                        categories += '    <td><button type="button" class="btn btn-secondary btn-sm section_edit" ' + data_id + '>Izmeni</button></td>';
                                        categories += '    <td><button type="button" class="btn btn-danger btn-sm section_delete" ' + data_id + '>Obriši</button></td>';
                                        categories += '</tr>';


                                    }


                                    catecategories_image_edit += '               <label><input type="checkbox" class="image_section_chb" value="' + section.id + '" ' + data_id + '>' + section.name + '</label>';




                                });
                                categories += '<tr>';
                                categories += '    <td scope="row"><input type="text" id="section_insert_name" placeholder="Nova kategorija"></td>';
                                categories += '    <td><input type="checkbox" id="section_insert_featured"></td>';
                                categories += '    <td align="center" colspan="2"><button type="button" class="btn btn-success btn-sm" id="section_insert_submit">Unesi kategoriju</button></td>';
                                categories += '</tr>';

                                $('#categories_list').html(categories);

                                if ($('.img_dropdown').length > 0) {
                                    $('.img_dropdown').html(catecategories_image_edit);
                                }

                            }
                        });
                    }

                    load_sections();
                    //! Load sections

                    //Check cb

                    //!Check cb


                    //Insert section

                    $('body').on('click', '#section_insert_submit', function () {

                        $.post('./db/insert_sections.php', {
                            name: $('#section_insert_name').val(),
                            featured: $('#section_insert_featured').is(":checked"),
                            insert: true
                        }, function () {
                            $('#section_insert_name').val('');
                            $('#section_insert_featured').prop('checked', false);
                            load_sections();
                        });
                    });

                    //!Insert section


                    //Edit section
                    function edit_section(section_id) {
                        var unassigned;
                        if (section_id == 0) {
                            unassigned = 1;
                        } else {
                            unassigned = 0;
                        }
                        $.ajax({
                            type: 'GET',
                            url: './db/edit_section.php',
                            data: {
                                section_id: section_id,
                                edit_section: true,
                                unassigned: unassigned
                            },
                            success: function (data) {

                                var data_parsed = JSON.parse(data);
                                var image_row = '';

                                $.each(data_parsed, function (i, image) {
                                    var image_id = 'data-image-id="' + image.image_id + '"';
                                    image_row += '<tr>';
                                    image_row += '   <td><img src="img/pictures/' + image.path + '" alt="' + image.alt + '"></td>';
                                    image_row += '   <td>';
                                    image_row += '       <input type="text" class="image_edit_name" ' + image_id + ' value="' + image.name + '">';
                                    image_row += '       <textarea class="image_edit_description" ' + image_id + '>' + image.description + '</textarea>';
                                    image_row += '   </td>';
                                    image_row += '   <td>';
                                    image_row += '       <input type="text" class="image_edit_alt" ' + image_id + ' value="' + image.alt + '">';
                                    image_row += '       <div class="dropdown">';
                                    image_row += '           <button class="btn btn-secondary dropdown-toggle" type="button" id="odaberi_kategoriju" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Odaberi kategoriju</button>';
                                    image_row += '           <div class="dropdown-menu img_dropdown" aria-labelledby="dropdownMenuButton" ' + image_id + ' >';
                                    image_row += '           </div>';
                                    image_row += '       </div>';
                                    image_row += '   </td>';
                                    image_row += '   <td>';
                                    image_row += '          <button type="button" class="btn btn-danger btn-sm image_delete" ' + image_id + '>Obriši</button>';
                                    image_row += '          <button type="button" class="btn btn-success btn-sm image_edit" ' + image_id + '>Izmeni</button>';
                                    image_row += '   </td>';
                                    image_row += '</tr>';
                                });

                                $('.section_edit_table').html(image_row);
                                load_sections();
                            }
                        });
                    }
                    $('body').on('click', '.section_edit', function () {
                        edit_section($(event.target).attr('data-id'));

                    });
                    //!Edit section

                    //Edit image
                    function edit_img(img_id, sections) {
                        $.ajax({
                            type: 'GET',
                            url: './db/edit_section.php',
                            data: {
                                image_id: img_id,
                                image_name: $(".image_edit_name[data-image-id=" + img_id + "]").val(),
                                image_alt: $(".image_edit_alt[data-image-id=" + img_id + "]").val(),
                                image_description: $(".image_edit_description[data-image-id=" + img_id + "]").val(),
                                section: JSON.stringify(sections),
                                edit_image: true
                            },
                            success: function () {
                                alert('image updated');
                            }
                        });
                    }
                    $('body').on('click', '.image_edit', function () {
                        id_img = $(this).attr('data-image-id');
                        var image_edit_section = [];
                        $('.img_dropdown[data-image-id=' + id_img + ']>label>input[type=checkbox]:checked').each(function (index) {
                            image_edit_section[index] = $(this).val();
                        });
                        edit_img($(event.target).attr('data-image-id'), image_edit_section);
                    });

                    //!Edit image

                    // Section checkbox
                    $('body').on('click', '.section_checkbox', function () {
                        var sid = $(this).attr('data-id');
                        var chb_status;
                        if ($(this).is(":checked")) {
                            chb_status = 1;
                        } else {
                            chb_status = 0;
                        }
                        $.post('./db/edit_section.php', {
                                section_id: sid,
                                chb_status: chb_status,
                                section_chb: true
                            },
                            function () {
                                load_sections();
                            });
                    });
                    // !Section checkbox


                    //Delete section

                    $('body').on('click', '.section_delete', function () {
                        var sid = $(this).attr('data-id');
                        var sname = $('td[data-id=' + sid + ']').text();
                        if (confirm("Da li sigurno želiš da obrišeš " + sname + "?")) {
                            $.post('./db/insert_sections.php', {
                                    id: sid,
                                    delete: true
                                },
                                function () {
                                    load_sections();
                                });
                        }

                    });

                    //!Delete section
                }
                // !Admin stuff up here


                // Select sections

                $('.section_selector').click(function () {
                    get_img($(this).attr('data-section_id'));
                });

                //! Select sections


                //Dim lights

                $('.member>img').hover(function () {
                    $('.member>img').one().css('filter', ' blur(2px) grayscale(50%) brightness(80%)')
                    $(this).one().css('filter', ' blur(0px) grayscale(0%) brightness(100%)');
                }, function () {

                    var grayscale = 50;
                    var brightness = 80;
                    var blur = 0; /*figure out blur later*/

                    for (brightness = 80; brightness <= 100; brightness++) {
                        setTimeout(function () {
                            $('.member>img').one().css('filter', ' blur(0px) grayscale(' + grayscale + '%) brightness(' + brightness + '%)');
                        }, 500);
                        grayscale -= 2.5;
                    }
                });

                //!Dim lights

                $('#tester').click(function () {
                    $('.img_dropdown').each(function () {

                        var image_id = $(this).attr('data-image-id');

                        $(this).find('input').each(function () {

                            var chb = $(this);
                            var section_id = chb.attr('data-id');

                            $.post('./db/edit_section.php', {
                                img_id: image_id,
                                ssid: section_id,
                                cb_check: true
                            }, function (data) {

                                chb.prop('checked', data);

                            });

                        });
                    });
                });

            });
