@extends('layouts.backend.jobseeker.app')

@section('content')
<header class="mb-0">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<!-- <div class="page-heading">
    <h3>Dashboard</h3>
</div> -->
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <label class="form-label" for="Subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                        <div id="invalid-subject" style="visibility: hidden;position: absolute;">
                            <li class="text-danger"></li>
                        </div>
                        <label class="form-label" for="formartikel">Description</label>
                        <div id="formartikel">
                        </div>
                        <div id="invalid-description" style="visibility: hidden;position: absolute;">
                            <li class="text-danger"></li>
                        </div>
                        <textarea style="visibility: hidden;position: absolute;" name="description" id="description" cols="0" rows="0"></textarea>
                        <div class="row mt-2">
                            <div class="col-6">
                                <button onclick="$('#foto_video').click()" type="button" class="btn btn-sm btn-success"><i class="fas fa-photo-video"></i> Foto/Video</button>
                                <div id="invalid-foto_video" style="visibility: hidden;position: absolute;">
                                    <li class="text-danger"></li>
                                </div>
                                <input type="file" style="visibility: hidden;" id="foto_video" name="foto_video" required>
                            </div>
                            <div class="col-6">
                                <button onclick="return postnow()" type="submit" class="btn btn-sm btn-primary" style="float: right;"><i class="fas fa-paper-plane"></i> Post Now</button>
                            </div>
                        </div>
                        <script>
                            // jika tombol post ditekan
                            function postnow() {
                                // mengambil inputan deskripsi
                                $('#description').text($('.ql-editor').html());

                                // validasi form
                                $('#invalid-subject').attr('style', 'visibility: hidden;position: absolute;')
                                $('#invalid-description').attr('style', 'visibility: hidden;position: absolute;')
                                $('#invalid-foto_video').attr('style', 'visibility: hidden;position: absolute;')

                                var err = 0;
                                if ($('#subject').val() == '') {
                                    $('#invalid-subject').removeAttr('style');
                                    $('#invalid-subject li').text('Subject is required');
                                    var err = 1;
                                }
                                if ($('#formartikel').text() == '') {
                                    $('#invalid-description').removeAttr('style');
                                    $('#invalid-description li').text('Description is required');
                                    var err = 1;
                                }
                                if ($('#foto_video').get(0).files.length === 0) {
                                    $('#invalid-foto_video').removeAttr('style');
                                    $('#invalid-foto_video li').text('Image is required');
                                    var err = 1;
                                } else {
                                    var ext = $('#foto_video').val().split('.').pop().toLowerCase();
                                    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                        $('#invalid-foto_video').removeAttr('style');
                                        $('#invalid-foto_video li').text("Allowed extensions : 'gif', 'png', 'jpg', 'jpeg'.");
                                        var err = 1;
                                    }
                                }
                                if (err == 1) {
                                    return false;
                                }
                            }
                        </script>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection